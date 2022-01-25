<?php



namespace Square\Models;

class ListCashDrawerShiftsRequest implements \JsonSerializable
{
    /**
     * @var string
     */
    private $locationId;

    /**
     * @var string|null
     */
    private $sortOrder;

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
    private $cursor;

    /**
     * @param $locationId
     */
    public function __construct($locationId)
    {
        $this->locationId = $locationId;
    }

    /**
     * Returns Location Id.
     *
     * The ID of the location to query for a list of cash drawer shifts.
     */
    public function getLocationId()
    {
        return $this->locationId;
    }

    /**
     * Sets Location Id.
     *
     * The ID of the location to query for a list of cash drawer shifts.
     *
     * @required
     * @maps location_id
     */
    public function setLocationId($locationId)
    {
        $this->locationId = $locationId;
    }

    /**
     * Returns Sort Order.
     *
     * The order (e.g., chronological or alphabetical) in which results from a request are returned.
     */
    public function getSortOrder()
    {
        return $this->sortOrder;
    }

    /**
     * Sets Sort Order.
     *
     * The order (e.g., chronological or alphabetical) in which results from a request are returned.
     *
     * @maps sort_order
     */
    public function setSortOrder($sortOrder = null)
    {
        $this->sortOrder = $sortOrder;
    }

    /**
     * Returns Begin Time.
     *
     * The inclusive start time of the query on opened_at, in ISO 8601 format.
     */
    public function getBeginTime()
    {
        return $this->beginTime;
    }

    /**
     * Sets Begin Time.
     *
     * The inclusive start time of the query on opened_at, in ISO 8601 format.
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
     * The exclusive end date of the query on opened_at, in ISO 8601 format.
     */
    public function getEndTime()
    {
        return $this->endTime;
    }

    /**
     * Sets End Time.
     *
     * The exclusive end date of the query on opened_at, in ISO 8601 format.
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
     * Number of cash drawer shift events in a page of results (200 by
     * default, 1000 max).
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * Sets Limit.
     *
     * Number of cash drawer shift events in a page of results (200 by
     * default, 1000 max).
     *
     * @maps limit
     */
    public function setLimit($limit = null)
    {
        $this->limit = $limit;
    }

    /**
     * Returns Cursor.
     *
     * Opaque cursor for fetching the next page of results.
     */
    public function getCursor()
    {
        return $this->cursor;
    }

    /**
     * Sets Cursor.
     *
     * Opaque cursor for fetching the next page of results.
     *
     * @maps cursor
     */
    public function setCursor($cursor = null)
    {
        $this->cursor = $cursor;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['location_id']    = $this->locationId;
        if (isset($this->sortOrder)) {
            $json['sort_order'] = $this->sortOrder;
        }
        if (isset($this->beginTime)) {
            $json['begin_time'] = $this->beginTime;
        }
        if (isset($this->endTime)) {
            $json['end_time']   = $this->endTime;
        }
        if (isset($this->limit)) {
            $json['limit']      = $this->limit;
        }
        if (isset($this->cursor)) {
            $json['cursor']     = $this->cursor;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
