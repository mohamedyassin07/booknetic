<?php



namespace Square\Models;

/**
 * Describes a `SearchInvoices` request.
 */
class SearchInvoicesRequest implements \JsonSerializable
{
    /**
     * @var InvoiceQuery
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
     * @param InvoiceQuery $query
     */
    public function __construct(InvoiceQuery $query)
    {
        $this->query = $query;
    }

    /**
     * Returns Query.
     *
     * Describes query criteria for searching invoices.
     */
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * Sets Query.
     *
     * Describes query criteria for searching invoices.
     *
     * @required
     * @maps query
     */
    public function setQuery(InvoiceQuery $query)
    {
        $this->query = $query;
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
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['query']      = $this->query;
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
