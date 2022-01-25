<?php



namespace Square;

/**
 * An interface for all configuration parameters required by the SDK.
 */
interface ConfigurationInterface
{
    /**
     * Get timeout for API calls
     */
    public function getTimeout();

    /**
     * Get square Connect API versions
     */
    public function getSquareVersion();

    /**
     * Get additional headers to add to each API call
     */
    public function getAdditionalHeaders();

    /**
     * Get current API environment
     */
    public function getEnvironment();

    /**
     * Get sets the base URL requests are made to. Defaults to `https://connect.squareup.com`
     */
    public function getCustomUrl();

    /**
     * Get the credentials to use with AccessToken
     */
    public function getAccessTokenCredentials();

    /**
     * Get the base uri for a given server in the current environment.
     *
     * @param $server Server name
     *
     * @return string Base URI
     */
    public function getBaseUri($server = Server::DEFAULT_);
}
