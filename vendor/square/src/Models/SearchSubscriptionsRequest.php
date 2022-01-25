<?php



namespace Square\Models;

/**
 * Defines parameters in a
 * [SearchSubscriptions]($e/Subscriptions/SearchSubscriptions) endpoint
 * request.
 */
class SearchSubscriptionsRequest implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $cursor;

    /**
     * @var int|null
     */
    private $limit;

    /**
     * @var SearchSubscriptionsQuery|null
     */
    private $query;

    /**
     * Returns Cursor.
     *
     * A pagination cursor returned by a previous call to this endpoint.
     * Provide this to retrieve the next set of results for the original query.
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
     * Provide this to retrieve the next set of results for the original query.
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
     * The upper limit on the number of subscriptions to return
     * in the response.
     *
     * Default: `200`
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * Sets Limit.
     *
     * The upper limit on the number of subscriptions to return
     * in the response.
     *
     * Default: `200`
     *
     * @maps limit
     */
    public function setLimit($limit = null)
    {
        $this->limit = $limit;
    }

    /**
     * Returns Query.
     *
     * Represents a query (including filtering criteria) used to search for subscriptions.
     */
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * Sets Query.
     *
     * Represents a query (including filtering criteria) used to search for subscriptions.
     *
     * @maps query
     */
    public function setQuery(SearchSubscriptionsQuery $query = null)
    {
        $this->query = $query;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->cursor)) {
            $json['cursor'] = $this->cursor;
        }
        if (isset($this->limit)) {
            $json['limit']  = $this->limit;
        }
        if (isset($this->query)) {
            $json['query']  = $this->query;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
