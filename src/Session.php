<?php

declare(strict_types=1);

namespace Deezer;

class Session
{
    public const AUTH_URL = 'https://connect.deezer.com';

    protected $app_id = '';
    protected $secret = '';
    protected $redirect_uri = '';
    protected $perms = '';

    protected $access_token = '';
    protected $expires = 0;

    protected $request = null;

    /**
     * Constructor
     * Set up client credentials.
     *
     * @param string $app_id The client ID.
     * @param string $secret Optional. The client secret.
     * @param string $redirect_uri Optional. The redirect URI.
     * @param Request|null $request Optional. The Request object to use.
     */
    public function __construct(string $app_id, string $secret = '', string $redirect_uri = '', Request $request = null)
    {
        $this->setAppId($app_id);
        $this->setSecret($secret);
        $this->setRedirectUri($redirect_uri);

        $this->request = $request ?: new Request();
    }


    /**
     * Generate a random state value.
     *
     * @param int $length Optional. Length of the state. Default is 16 characters.
     *
     * @return string A random state value.
     */
    public function generateState(int $length = 16)
    {
        // Length will be doubled when converting to hex
        return bin2hex(
            random_bytes($length / 2)
        );
    }

    /**
     * Get the authorization URL.
     *
     * @param array|object $options Optional. Options for the authorization URL.
     * - array perms Optional. Scope(s) to request from the user.
     * - boolean show_dialog Optional. Whether or not to force the user to always approve the app. Default is false.
     * - string state Optional. A CSRF token.
     *
     * @return string The authorization URL.
     */
    public function getAuthorizeUrl($options = [])
    {
        $options = (array) $options;

        $parameters = [
            'app_id' => $this->app_id,
            'redirect_uri' => $this->redirect_uri,
            'perms' => isset($options['perms']) ? implode(',', $options['perms']) : 'basic_access',
            'state' => $options['state'] ?? $this->generateState(),
        ];

        return self::AUTH_URL . '/oauth/auth.php?' . http_build_query($parameters);
    }

    /**
     * Get the access token.
     *
     * @return string The access token.
     */
    public function getAccessToken(): string
    {
        return $this->access_token;
    }

    /**
     * Get the access token expiration time.
     *
     * @return int A Unix timestamp indicating the token expiration time.
     */
    public function getExpires(): int
    {
        return $this->expires;
    }

    /**
     * Request an access token given an authorization code.
     *
     * @param string $code The authorization code from Deezer.
     *
     * @return bool True when the access token was successfully granted, false otherwise.
     */
    public function requestAccessToken(string $code): bool
    {
        $parameters = [
            'app_id' => $this->app_id,
            'secret' => $this->secret,
            'code' => $code,
        ];

        $response = $this->request->send('GET', self::AUTH_URL . '/oauth/access_token.php', $parameters);

        $response = $response['body'];

        if (isset($response['access_token']) && isset($response['expires'])) {
            $this->access_token = $response['access_token'];
            $this->expires = (int)$response['expires'];
            return true;
        }

        return false;
    }

    /**
     * Set the Application ID.
     *
     * @param string $app_id The Application ID.
     *
     * @return void
     */
    public function setAppId(string $app_id)
    {
        $this->app_id = $app_id;
    }

    /**
     * Set the secret key.
     *
     * @param string $secret The secret key.
     *
     * @return void
     */
    public function setSecret(string $secret)
    {
        $this->secret = $secret;
    }

    /**
     * Set the Application's redirect URI.
     *
     * @param string $redirect_uri The redirect URI.
     *
     * @return void
     */
    public function setRedirectUri(string $redirect_uri)
    {
        $this->redirect_uri = $redirect_uri;
    }
}
