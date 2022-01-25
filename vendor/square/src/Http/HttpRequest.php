<?php



namespace Square\Http;

/**
 * Represents a single Http Request
 */
class HttpRequest
{
    /**
     * HTTP method as defined in HttpMethod class
     *
     * @var string
     */
    private $httpMethod = null;

    /**
     * Headers
     *
     * @var array
     */
    private $headers = null;

    /**
     * Query url
     *
     * @var string
     */
    private $queryUrl = null;

    /**
     * Input parameters
     *
     * @var array
     */
    private $parameters = null;

    /**
     * Create a new HttpRequest
     *
     * @param string      $httpMethod HTTP method
     * @param array|null  $headers    Map of headers
     * @param string|null $queryUrl   Query url
     * @param array|null  $parameters Map of parameters sent
     */
    public function __construct(
        $httpMethod,
        array $headers = null,
        $queryUrl = null,
        array $parameters = null
    ) {
        $this->httpMethod = $httpMethod;
        $this->headers = $headers;
        $this->queryUrl = $queryUrl;
        $this->parameters = $parameters;
    }

    /**
     * Get HTTP method
     */
    public function getHttpMethod()
    {
        return $this->httpMethod;
    }

    /**
     * Set HTTP method
     *
     * @param $httpMethod HTTP Method as defined in HttpMethod class
     */
    public function setHttpMethod($httpMethod)
    {
        $this->httpMethod = $httpMethod;
    }

    /**
     * Get headers
     *
     * @return array Map of headers
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * Set headers
     *
     * @param array $headers Headers as map
     */
    public function setHeaders(array $headers)
    {
        $this->headers = $headers;
    }

    /**
     * Add or replace a single header
     *
     * @param $key   key for the header
     * @param $value value of the header
     */
    public function addHeader($key, $value)
    {
        $this->headers[$key] = $value;
    }

    /**
     * Get query url
     *
     * @return string Query url
     */
    public function getQueryUrl()
    {
        return $this->queryUrl;
    }

    /**
     * Set query url
     *
     * @param $queryUrl Query url
     */
    public function setQueryUrl($queryUrl)
    {
        $this->queryUrl = $queryUrl;
    }

    /**
     * Get parameters
     *
     * @return array Map of input parameters
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * Set parameters
     *
     * @param array $parameters Map of input parameters
     */
    public function setParameters(array $parameters)
    {
        $this->parameters = $parameters;
    }
}
