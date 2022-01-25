<?php



namespace Square\Models;

/**
 * Describes a `ListInvoice` request.
 */
class ListInvoicesRequest implements \JsonSerializable
{
    /**
     * @var string
     */
    private $locationId;

    /**
     * @var string|null
     */
    private $cursor;

    /**
     * @var int|null
     */
    private $limit;

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
     * The ID of the location for which to list invoices.
     */
    public function getLocationId()
    {
        return $this->locationId;
    }

    /**
     * Sets Location Id.
     *
     * The ID of the location for which to list invoices.
     *
     * @required
     * @maps location_id
     */
    public function setLocationId($locationId)
    {
        $this->locationId = $locationId;
    }

    /**
     * Returns Cursor.
     *
     * A pagination cursor returned by a previous call to this endpoint.
     * Provide this cursor to retrieve the next set of results for your original query.
     *
     * For more information, see [Pagination](https://developer.squareup.com/docs/working-with-
     * apis/pagination).
     */
    public function getCursor()
    {
        return $this->cursor;
    }

    /**
     * Sets Cursor.
     *
     * A pagination cursor returned by a previous call to this endpoint.
     * Provide this cursor to retrieve the next set of results for your original query.
     *
     * For more information, see [Pagination](https://developer.squareup.com/docs/working-with-
     * apis/pagination).
     *
     * @maps cursor
     */
    public function setCursor($cursor = null)
    {
        $this->cursor = $cursor;
    }

    /**
     * Returns Limit.
     *
     * The maximum number of invoices to return (200 is the maximum `limit`).
     * If not provided, the server uses a default limit of 100 invoices.
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * Sets Limit.
     *
     * The maximum number of invoices to return (200 is the maximum `limit`).
     * If not provided, the server uses a default limit of 100 invoices.
     *
     * @maps limit
     */
    public function setLimit($limit = null)
    {
        $this->limit = $limit;
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
        if (isset($this->cursor)) {
            $json['cursor']  = $this->cursor;
        }
        if (isset($this->limit)) {
            $json['limit']   = $this->limit;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
