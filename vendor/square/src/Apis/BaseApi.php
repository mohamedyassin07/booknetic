<?php



namespace Square\Apis;

use Square\Http\HttpCallBack;
use Square\Http\HttpResponse;
use Square\ConfigurationInterface;
use Square\AuthManagerInterface;
use apimatic\jsonmapper\JsonMapper;

/**
 * Base controller
 */
class BaseApi
{
    /**
     * User-agent to be sent with API calls
     *
     * @var string
     */
    const USER_AGENT = 'Square-PHP-SDK/13.0.0.20210721';

    /**
     * HttpCallBack instance associated with this controller
     *
     * @var HttpCallBack|null
     */
    private $httpCallBack;

    /**
     * Configuration instance
     *
     * @var ConfigurationInterface
     */
    protected $config;

    /**
     * List of auth managers for this controller.
     *
     * @var array
     */
    private $authManagers = [];

    /**
     * Constructor that sets the timeout of requests
     */
    protected function __construct(ConfigurationInterface $config, array $authManagers, HttpCallBack $httpCallBack = null)
    {
        $this->config = $config;
        $this->authManagers = $authManagers;
        $this->httpCallBack = $httpCallBack;
    }

    /**
     * Get auth manager for the provided namespace key.
     *
     * @param  string   $key         Namespace key
     * @return AuthManagerInterface  The AuthManager set for this key.
     */
    protected function getAuthManager($key)
    {
        return $this->authManagers[$key];
    }

    /**
     * Get HttpCallBack for this controller
     *
     * @return HttpCallBack|null The HttpCallBack object set for this controller
     */
    public function getHttpCallBack()
    {
        return $this->httpCallBack;
    }

    /**
     * Get a new JsonMapper instance for mapping objects
     *
     * @return \apimatic\jsonmapper\JsonMapper JsonMapper instance
     */
    protected function getJsonMapper()
    {
        $mapper = new JsonMapper();
        return $mapper;
    }

    /**
     * Is the response valid?
     */
    protected function isValidResponse(HttpResponse $response)
    {
        return $response->getStatusCode() >= 200 && $response->getStatusCode() < 300;
    }
}