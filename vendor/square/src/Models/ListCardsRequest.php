<?php



namespace Square\Models;

/**
 * Retrieves details for a specific Card. Accessible via
 * HTTP requests at GET https://connect.squareup.com/v2/cards
 */
class ListCardsRequest implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $cursor;

    /**
     * @var string|null
     */
    private $customerId;

    /**
     * @var bool|null
     */
    private $includeDisabled;

    /**
     * @var string|null
     */
    private $referenceId;

    /**
     * @var string|null
     */
    private $sortOrder;

    /**
     * Returns Cursor.
     *
     * A pagination cursor returned by a previous call to this endpoint.
     * Provide this to retrieve the next set of results for your original query.
     *
     * See [Pagination](https://developer.squareup.com/docs/basics/api101/pagination) for more information.
     */
    public function getCursor()
    {
        return $this->cursor;
    }

    /**
     * Sets Cursor.
     *
     * A pagination cursor returned by a previous call to this endpoint.
     * Provide this to retrieve the next set of results for your original query.
     *
     * See [Pagination](https://developer.squareup.com/docs/basics/api101/pagination) for more information.
     *
     * @maps cursor
     */
    public function setCursor($cursor = null)
    {
        $this->cursor = $cursor;
    }

    /**
     * Returns Customer Id.
     *
     * Limit results to cards associated with the customer supplied.
     * By default, all cards owned by the merchant are returned.
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * Sets Customer Id.
     *
     * Limit results to cards associated with the customer supplied.
     * By default, all cards owned by the merchant are returned.
     *
     * @maps customer_id
     */
    public function setCustomerId($customerId = null)
    {
        $this->customerId = $customerId;
    }

    /**
     * Returns Include Disabled.
     *
     * Includes disabled cards.
     * By default, all enabled cards owned by the merchant are returned.
     */
    public function getIncludeDisabled()
    {
        return $this->includeDisabled;
    }

    /**
     * Sets Include Disabled.
     *
     * Includes disabled cards.
     * By default, all enabled cards owned by the merchant are returned.
     *
     * @maps include_disabled
     */
    public function setIncludeDisabled($includeDisabled = null)
    {
        $this->includeDisabled = $includeDisabled;
    }

    /**
     * Returns Reference Id.
     *
     * Limit results to cards associated with the reference_id supplied.
     */
    public function getReferenceId()
    {
        return $this->referenceId;
    }

    /**
     * Sets Reference Id.
     *
     * Limit results to cards associated with the reference_id supplied.
     *
     * @maps reference_id
     */
    public function setReferenceId($referenceId = null)
    {
        $this->referenceId = $referenceId;
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
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->cursor)) {
            $json['cursor']           = $this->cursor;
        }
        if (isset($this->customerId)) {
            $json['customer_id']      = $this->customerId;
        }
        if (isset($this->includeDisabled)) {
            $json['include_disabled'] = $this->includeDisabled;
        }
        if (isset($this->referenceId)) {
            $json['reference_id']     = $this->referenceId;
        }
        if (isset($this->sortOrder)) {
            $json['sort_order']       = $this->sortOrder;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
