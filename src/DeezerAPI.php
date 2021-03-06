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

/**
 * Class DeezerAPI
 * @package Deezer
 *
 * @property ArtistResource $artist
 * @property AlbumResource $album
 * @property ChartResource $chart
 * @property EditorialResource $editorial
 * @property GenreResource $genre
 * @property RadioResource $radio
 * @property SearchResource $search
 * @property TrackResource $track
 * @property PlaylistResource $playlist
 * @property UserResource $user
 * @property PodcastResource $podcast
 * @property EpisodeResource $episode
 */
class DeezerAPI
{
    protected $accessToken = '';
    protected $lastResponse = [];
    protected $options = [
        'auto_refresh' => false,
        'auto_retry' => false,
        'return_assoc' => false,
    ];
    protected $request = null;


    /** @var array Cache of resources. */
    private $resources = [];

    /**
     * Constructor
     * Set options and class instances to use.
     *
     * @param array|object $options Optional. Options to set.
     * @param Request $request Optional. The Request object to use.
     */
    public function __construct($options = [], $request = null)
    {
        $this->setOptions($options);

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

    /**
     * Add authorization headers.
     *
     * @param $headers array. Optional. Additional headers to merge with the authorization headers.
     *
     * @return array Authorization headers, optionally merged with the passed ones.
     */
    protected function authHeaders($headers = [])
    {
        if ($this->accessToken) {
            $headers = array_merge($headers, [
                'Authorization' => 'Bearer ' . $this->accessToken,
            ]);
        }

        return $headers;
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
     * - array|object body The response body. Type is controlled by the `return_assoc` option.
     * - array headers Response headers.
     * - int status HTTP status code.
     * - string url The requested URL.
     */
    public function sendRequest($method, $uri, $parameters = [], $headers = [])
    {
//        $this->request->setOptions([
//            'return_assoc' => true,//$this->options['return_assoc'],
//        ]);

        try {
            if ($this->accessToken) {
                $parameters['access_token'] = $this->accessToken;
            }

            //$parameters['output'] = 'json';

            return $this->request->send($method, Request::API_URL . $uri, $parameters, $headers);
        } catch (DeezerAPIException $e) {
            throw $e;
        }
    }


    /**
     * Get the user's options
     * https://developers.deezer.com/api/options
     *
     * @return array|object An object of type options
     * @throws DeezerAPIException
     */
    public function options()
    {
        $response = $this->sendRequest('GET', "/options");

        return $response['body'];
    }

    /**
     * Get the information about the API in the current country
     * https://developers.deezer.com/api/infos
     *
     * @return array|object An object of type infos
     * @throws DeezerAPIException
     */
    public function infos()
    {
        $response = $this->sendRequest('GET', "/infos");

        return $response['body'];
    }
}
