<?php



namespace Square\Models;

/**
 * Represents a search request for a filtered list of `TeamMember` objects.
 */
class SearchTeamMembersRequest implements \JsonSerializable
{
    /**
     * @var SearchTeamMembersQuery|null
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
     * Represents the parameters in a search for `TeamMember` objects.
     */
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * Sets Query.
     *
     * Represents the parameters in a search for `TeamMember` objects.
     *
     * @maps query
     */
    public function setQuery(SearchTeamMembersQuery $query = null)
    {
        $this->query = $query;
    }

    /**
     * Returns Limit.
     *
     * The maximum number of `TeamMember` objects in a page (100 by default).
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * Sets Limit.
     *
     * The maximum number of `TeamMember` objects in a page (100 by default).
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
     * The opaque cursor for fetching the next page. For more information, see
     * [pagination](https://developer.squareup.com/docs/working-with-apis/pagination).
     */
    public function getCursor()
    {
        return $this->cursor;
    }

    /**
     * Sets Cursor.
     *
     * The opaque cursor for fetching the next page. For more information, see
     * [pagination](https://developer.squareup.com/docs/working-with-apis/pagination).
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
