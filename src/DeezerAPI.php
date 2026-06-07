<?php

declare(strict_types=1);

namespace Deezer;

use Deezer\Resources\AlbumResource;
use Deezer\Resources\ArtistResource;
use Deezer\Resources\ChartResource;
use Deezer\Resources\EditorialResource;
use Deezer\Resources\EpisodeResource;
use Deezer\Resources\GenreResource;
use Deezer\Resources\PlaylistResource;
use Deezer\Resources\PodcastResource;
use Deezer\Resources\RadioResource;
use Deezer\Resources\ResourceInterface;
use Deezer\Resources\SearchResource;
use Deezer\Resources\TrackResource;
use Deezer\Resources\UserResource;
use Deezer\TokenProviderInterface;
use Deezer\Types;

/**
 * Class DeezerAPI
 * @package Deezer
 *
 * @phpstan-import-type InfosObject from Types
 *
 * @property \Deezer\Resources\Interfaces\AlbumResourceInterface $album
 * @property \Deezer\Resources\Interfaces\ArtistResourceInterface $artist
 * @property \Deezer\Resources\Interfaces\ChartResourceInterface $chart
 * @property \Deezer\Resources\Interfaces\CommentResourceInterface $comment
 * @property \Deezer\Resources\Interfaces\EditorialResourceInterface $editorial
 * @property \Deezer\Resources\Interfaces\EpisodeResourceInterface $episode
 * @property \Deezer\Resources\Interfaces\GenreResourceInterface $genre
 * @property \Deezer\Resources\Interfaces\PlaylistResourceInterface $playlist
 * @property \Deezer\Resources\Interfaces\PodcastResourceInterface $podcast
 * @property \Deezer\Resources\Interfaces\RadioResourceInterface $radio
 * @property \Deezer\Resources\Interfaces\SearchResourceInterface $search
 * @property \Deezer\Resources\Interfaces\TrackResourceInterface $track
 * @property \Deezer\Resources\Interfaces\UserResourceInterface $user
 */
class DeezerAPI
{
    private const RETRY_DELAYS = [1, 2, 5, 10, 30, 60];

    protected string $accessToken = '';
    protected array $lastResponse = [];
    protected array $options = [
        'auto_refresh' => false,
        'auto_retry'   => false,
    ];
    protected ?Request $request = null;
    private ?TokenProviderInterface $tokenProvider = null;

    /** @var array Cache of resources. */
    private array $resources = [];

    /**
     * Constructor
     * Set options and class instances to use.
     *
     * @param array $options Optional. Options to set.
     * @param TokenProviderInterface|null $tokenProvider Optional. Token provider to use.
     * @param Request|null $request Optional. The Request object to use.
     */
    public function __construct(
        array $options = [],
        ?TokenProviderInterface $tokenProvider = null,
        ?Request $request = null
    ) {
        $this->setOptions($options);
        $this->tokenProvider = $tokenProvider;
        $this->request = $request ?: new Request();
    }



    /**
     * @param string $name
     *
     * @return Resource
     */
    public function __get($name)
    {
        return $this->makeResource($name);
    }

    /**
     * @param string $name
     *
     * @return mixed
     */
    private function makeResource($name)
    {
        if (!isset($this->resources[$name])) {
            $this->resources[$name] = $this->loadResource($name);
        }

        return $this->resources[$name];
    }

    /**
     * @param string $service
     *
     * @return ResourceInterface
     * @throws \RuntimeException
     */
    private function loadResource($service): ResourceInterface
    {
        $service = ucfirst($service);

        $path = __DIR__ . "/Resources/{$service}Resource.php";
        if (!is_readable($path)) {
            throw new \RuntimeException(
                "The resources file \"{$path}\" was not found."
            );
        }
        $class = "Deezer\Resources\\{$service}Resource";

        return new $class($this);
    }

    /**
     * Set options
     *
     * @param array|object $options Options to set.
     *
     * @return void
     */
    public function setOptions($options)
    {
        $this->options = array_merge($this->options, (array) $options);
    }

    /**
     * Set the access token to use.
     *
     * @param string $accessToken The access token.
     *
     * @return void
     */
    public function setAccessToken(string $accessToken)
    {
        $this->accessToken = $accessToken;
    }

    public function setResource(string $name, ResourceInterface $resource): void
    {
        $this->resources[$name] = $resource;
    }

    /**
     * Send a request to the Deezer API, automatically refreshing the access token as needed.
     *
     * @param string $method The HTTP method to use.
     * @param string $uri The URI to request.
     * @param array $parameters Optional. Query string parameters or HTTP body, depending on $method.
     * @param array $headers Optional. HTTP headers.
     *
     * @throws DeezerAPIException
     *
     * @return array Response data.
     * - object body The decoded JSON response body.
     * - array headers Response headers.
     * - int status HTTP status code.
     * - string url The requested URL.
     */
    public function sendRequest($method, $uri, $parameters = [], $headers = [])
    {
        if ($this->tokenProvider !== null) {
            if ($this->tokenProvider->isExpired()) {
                $this->tokenProvider->refresh();
            }
            $this->accessToken = $this->tokenProvider->getToken();
        }

        if ($this->accessToken) {
            $parameters['access_token'] = $this->accessToken;
        }

        $attempt = 0;
        while (true) {
            try {
                return $this->request->send($method, Request::API_URL . $uri, $parameters, $headers);
            } catch (DeezerRateLimitException $e) {
                if (!$this->options['auto_retry'] || $attempt >= count(self::RETRY_DELAYS)) {
                    throw $e;
                }
                sleep(min($e->getRetryAfter(), self::RETRY_DELAYS[$attempt]));
                $attempt++;
            }
        }
    }


    /**
     * Get the user's options
     * https://developers.deezer.com/api/options
     *
     * @auth optional
     * @return object
     * @throws DeezerAPIException
     */
    public function options(): object
    {
        $response = $this->sendRequest('GET', "/options");

        return $response['body'];
    }

    /**
     * Get the information about the API in the current country
     * https://developers.deezer.com/api/infos
     *
     * @auth none
     * @return InfosObject
     * @throws DeezerAPIException
     */
    public function infos(): object
    {
        $response = $this->sendRequest('GET', "/infos");

        return $response['body'];
    }
}
