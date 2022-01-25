<?php



namespace Square\Models;

class ListCashDrawerShiftEventsRequest implements \JsonSerializable
{
    /**
     * @var string
     */
    private $locationId;

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
     * The ID of the location to list cash drawer shifts for.
     */
    public function getLocationId()
    {
        return $this->locationId;
    }

    /**
     * Sets Location Id.
     *
     * The ID of the location to list cash drawer shifts for.
     *
     * @required
     * @maps location_id
     */
    public function setLocationId($locationId)
    {
        $this->locationId = $locationId;
    }

    /**
     * Returns Limit.
     *
     * Number of resources to be returned in a page of results (200 by
     * default, 1000 max).
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * Sets Limit.
     *
     * Number of resources to be returned in a page of results (200 by
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
        $json['location_id'] = $this->locationId;
        if (isset($this->limit)) {
            $json['limit']   = $this->limit;
        }
        if (isset($this->cursor)) {
            $json['cursor']  = $this->cursor;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
