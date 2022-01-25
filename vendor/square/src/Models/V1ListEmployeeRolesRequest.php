<?php



namespace Square\Models;

class V1ListEmployeeRolesRequest implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $order;

    /**
     * @var int|null
     */
    private $limit;

    /**
     * @var string|null
     */
    private $batchToken;

    /**
     * Returns Order.
     *
     * The order (e.g., chronological or alphabetical) in which results from a request are returned.
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * Sets Order.
     *
     * The order (e.g., chronological or alphabetical) in which results from a request are returned.
     *
     * @maps order
     */
    public function setOrder($order = null)
    {
        $this->order = $order;
    }

    /**
     * Returns Limit.
     *
     * The maximum integer number of employee entities to return in a single response. Default 100, maximum
     * 200.
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * Sets Limit.
     *
     * The maximum integer number of employee entities to return in a single response. Default 100, maximum
     * 200.
     *
     * @maps limit
     */
    public function setLimit($limit = null)
    {
        $this->limit = $limit;
    }

    /**
     * Returns Batch Token.
     *
     * A pagination cursor to retrieve the next set of results for your
     * original query to the endpoint.
     */
    public function getBatchToken()
    {
        return $this->batchToken;
    }

    /**
     * Sets Batch Token.
     *
     * A pagination cursor to retrieve the next set of results for your
     * original query to the endpoint.
     *
     * @maps batch_token
     */
    public function setBatchToken($batchToken = null)
    {
        $this->batchToken = $batchToken;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->order)) {
            $json['order']       = $this->order;
        }
        if (isset($this->limit)) {
            $json['limit']       = $this->limit;
        }
        if (isset($this->batchToken)) {
            $json['batch_token'] = $this->batchToken;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
