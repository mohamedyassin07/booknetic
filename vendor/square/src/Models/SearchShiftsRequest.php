<?php



namespace Square\Models;

/**
 * A request for a filtered and sorted set of `Shift` objects.
 */
class SearchShiftsRequest implements \JsonSerializable
{
    /**
     * @var ShiftQuery|null
     */
    private $query;

    /**
     * @var int|null
     */
    private $limit;

    /**
     * @var string|null
     */
    private $cursor;

    /**
     * Returns Query.
     *
     * The parameters of a `Shift` search query. Includes filter and sort options.
     */
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * Sets Query.
     *
     * The parameters of a `Shift` search query. Includes filter and sort options.
     *
     * @maps query
     */
    public function setQuery(ShiftQuery $query = null)
    {
        $this->query = $query;
    }

    /**
     * Returns Limit.
     *
     * number of resources in a page (200 by default).
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * Sets Limit.
     *
     * number of resources in a page (200 by default).
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
     * opaque cursor for fetching the next page.
     */
    public function getCursor()
    {
        return $this->cursor;
    }

    /**
     * Sets Cursor.
     *
     * opaque cursor for fetching the next page.
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
        if (isset($this->query)) {
            $json['query']  = $this->query;
        }
        if (isset($this->limit)) {
            $json['limit']  = $this->limit;
        }
        if (isset($this->cursor)) {
            $json['cursor'] = $this->cursor;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
