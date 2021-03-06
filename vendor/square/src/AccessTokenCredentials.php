<?php



namespace Square;

/**
 * Interface for defining the behavior of Authentication.
 */
interface AccessTokenCredentials
{
    /**
     * String value for accessToken.
     */
    public function getAccessToken();

    /**
     * Checks if provided credentials match with existing ones.
     *
     * @param string|null $accessToken The OAuth 2.0 Access Token to use for API requests.
     */
    public function equals($accessToken = null);
}
