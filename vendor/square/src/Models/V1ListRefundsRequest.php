<?php



namespace Square\Models;

class V1ListRefundsRequest implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $order;

    /**
     * @var string|null
     */
    private $beginTime;

    /**
     * @var string|null
     */
    private $endTime;

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
     * Returns Begin Time.
     *
     * The beginning of the requested reporting period, in ISO 8601 format. If this value is before January
     * 1, 2013 (2013-01-01T00:00:00Z), this endpoint returns an error. Default value: The current time
     * minus one year.
     */
    public function getBeginTime()
    {
        return $this->beginTime;
    }

    /**
     * Sets Begin Time.
     *
     * The beginning of the requested reporting period, in ISO 8601 format. If this value is before January
     * 1, 2013 (2013-01-01T00:00:00Z), this endpoint returns an error. Default value: The current time
     * minus one year.
     *
     * @maps begin_time
     */
    public function setBeginTime($beginTime = null)
    {
        $this->beginTime = $beginTime;
    }

    /**
     * Returns End Time.
     *
     * The end of the requested reporting period, in ISO 8601 format. If this value is more than one year
     * greater than begin_time, this endpoint returns an error. Default value: The current time.
     */
    public function getEndTime()
    {
        return $this->endTime;
    }

    /**
     * Sets End Time.
     *
     * The end of the requested reporting period, in ISO 8601 format. If this value is more than one year
     * greater than begin_time, this endpoint returns an error. Default value: The current time.
     *
     * @maps end_time
     */
    public function setEndTime($endTime = null)
    {
        $this->endTime = $endTime;
    }

    /**
     * Returns Limit.
     *
     * The approximate number of refunds to return in a single response. Default: 100. Max: 200. Response
     * may contain more results than the prescribed limit when refunds are made simultaneously to multiple
     * tenders in a payment or when refunds are generated in an exchange to account for the value of
     * returned goods.
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * Sets Limit.
     *
     * The approximate number of refunds to return in a single response. Default: 100. Max: 200. Response
     * may contain more results than the prescribed limit when refunds are made simultaneously to multiple
     * tenders in a payment or when refunds are generated in an exchange to account for the value of
     * returned goods.
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
        if (isset($this->beginTime)) {
            $json['begin_time']  = $this->beginTime;
        }
        if (isset($this->endTime)) {
            $json['end_time']    = $this->endTime;
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
