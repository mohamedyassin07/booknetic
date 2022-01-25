<?php



namespace Square\Models;

class ListEmployeesRequest implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $locationId;

    /**
     * @var string|null
     */
    private $status;

    /**
     * @var int|null
     */
    private $limit;

    /**
     * @var string|null
     */
    private $cursor;

    /**
     * Returns Location Id.
     */
    public function getLocationId()
    {
        return $this->locationId;
    }

    /**
     * Sets Location Id.
     *
     * @maps location_id
     */
    public function setLocationId($locationId = null)
    {
        $this->locationId = $locationId;
    }

    /**
     * Returns Status.
     *
     * The status of the Employee being retrieved.
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets Status.
     *
     * The status of the Employee being retrieved.
     *
     * @maps status
     */
    public function setStatus($status = null)
    {
        $this->status = $status;
    }

    /**
     * Returns Limit.
     *
     * The number of employees to be returned on each page.
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * Sets Limit.
     *
     * The number of employees to be returned on each page.
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
     * The token required to retrieve the specified page of results.
     */
    public function getCursor()
    {
        return $this->cursor;
    }

    /**
     * Sets Cursor.
     *
     * The token required to retrieve the specified page of results.
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
        if (isset($this->locationId)) {
            $json['location_id'] = $this->locationId;
        }
        if (isset($this->status)) {
            $json['status']      = $this->status;
        }
        if (isset($this->limit)) {
            $json['limit']       = $this->limit;
        }
        if (isset($this->cursor)) {
            $json['cursor']      = $this->cursor;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
