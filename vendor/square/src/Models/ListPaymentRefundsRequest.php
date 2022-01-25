<?php



namespace Square\Models;

/**
 * Describes a request to list refunds using
 * [ListPaymentRefunds]($e/Refunds/ListPaymentRefunds).
 *
 * The maximum results per page is 100.
 */
class ListPaymentRefundsRequest implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $beginTime;

    /**
     * @var string|null
     */
    private $endTime;

    /**
     * @var string|null
     */
    private $sortOrder;

    /**
     * @var string|null
     */
    private $cursor;

    /**
     * @var string|null
     */
    private $locationId;

    /**
     * @var string|null
     */
    private $status;

    /**
     * @var string|null
     */
    private $sourceType;

    /**
     * @var int|null
     */
    private $limit;

    /**
     * Returns Begin Time.
     *
     * The timestamp for the beginning of the requested reporting period, in RFC 3339 format.
     *
     * Default: The current time minus one year.
     */
    public function getBeginTime()
    {
        return $this->beginTime;
    }

    /**
     * Sets Begin Time.
     *
     * The timestamp for the beginning of the requested reporting period, in RFC 3339 format.
     *
     * Default: The current time minus one year.
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
     * The timestamp for the end of the requested reporting period, in RFC 3339 format.
     *
     * Default: The current time.
     */
    public function getEndTime()
    {
        return $this->endTime;
    }

    /**
     * Sets End Time.
     *
     * The timestamp for the end of the requested reporting period, in RFC 3339 format.
     *
     * Default: The current time.
     *
     * @maps end_time
     */
    public function setEndTime($endTime = null)
    {
        $this->endTime = $endTime;
    }

    /**
     * Returns Sort Order.
     *
     * The order in which results are listed:
     * - `ASC` - Oldest to newest.
     * - `DESC` - Newest to oldest (default).
     */
    public function getSortOrder()
    {
        return $this->sortOrder;
    }

    /**
     * Sets Sort Order.
     *
     * The order in which results are listed:
     * - `ASC` - Oldest to newest.
     * - `DESC` - Newest to oldest (default).
     *
     * @maps sort_order
     */
    public function setSortOrder($sortOrder = null)
    {
        $this->sortOrder = $sortOrder;
    }

    /**
     * Returns Cursor.
     *
     * A pagination cursor returned by a previous call to this endpoint.
     * Provide this cursor to retrieve the next set of results for the original query.
     *
     * For more information, see [Pagination](https://developer.squareup.com/docs/basics/api101/pagination).
     */
    public function getCursor()
    {
        return $this->cursor;
    }

    /**
     * Sets Cursor.
     *
     * A pagination cursor returned by a previous call to this endpoint.
     * Provide this cursor to retrieve the next set of results for the original query.
     *
     * For more information, see [Pagination](https://developer.squareup.com/docs/basics/api101/pagination).
     *
     * @maps cursor
     */
    public function setCursor($cursor = null)
    {
        $this->cursor = $cursor;
    }

    /**
     * Returns Location Id.
     *
     * Limit results to the location supplied. By default, results are returned
     * for all locations associated with the seller.
     */
    public function getLocationId()
    {
        return $this->locationId;
    }

    /**
     * Sets Location Id.
     *
     * Limit results to the location supplied. By default, results are returned
     * for all locations associated with the seller.
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
     * If provided, only refunds with the given status are returned.
     * For a list of refund status values, see [PaymentRefund]($m/PaymentRefund).
     *
     * Default: If omitted, refunds are returned regardless of their status.
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets Status.
     *
     * If provided, only refunds with the given status are returned.
     * For a list of refund status values, see [PaymentRefund]($m/PaymentRefund).
     *
     * Default: If omitted, refunds are returned regardless of their status.
     *
     * @maps status
     */
    public function setStatus($status = null)
    {
        $this->status = $status;
    }

    /**
     * Returns Source Type.
     *
     * If provided, only refunds with the given source type are returned.
     * - `CARD` - List refunds only for payments where `CARD` was specified as the payment
     * source.
     *
     * Default: If omitted, refunds are returned regardless of the source type.
     */
    public function getSourceType()
    {
        return $this->sourceType;
    }

    /**
     * Sets Source Type.
     *
     * If provided, only refunds with the given source type are returned.
     * - `CARD` - List refunds only for payments where `CARD` was specified as the payment
     * source.
     *
     * Default: If omitted, refunds are returned regardless of the source type.
     *
     * @maps source_type
     */
    public function setSourceType($sourceType = null)
    {
        $this->sourceType = $sourceType;
    }

    /**
     * Returns Limit.
     *
     * The maximum number of results to be returned in a single page.
     *
     * It is possible to receive fewer results than the specified limit on a given page.
     *
     * If the supplied value is greater than 100, no more than 100 results are returned.
     *
     * Default: 100
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * Sets Limit.
     *
     * The maximum number of results to be returned in a single page.
     *
     * It is possible to receive fewer results than the specified limit on a given page.
     *
     * If the supplied value is greater than 100, no more than 100 results are returned.
     *
     * Default: 100
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
        if (isset($this->beginTime)) {
            $json['begin_time']  = $this->beginTime;
        }
        if (isset($this->endTime)) {
            $json['end_time']    = $this->endTime;
        }
        if (isset($this->sortOrder)) {
            $json['sort_order']  = $this->sortOrder;
        }
        if (isset($this->cursor)) {
            $json['cursor']      = $this->cursor;
        }
        if (isset($this->locationId)) {
            $json['location_id'] = $this->locationId;
        }
        if (isset($this->status)) {
            $json['status']      = $this->status;
        }
        if (isset($this->sourceType)) {
            $json['source_type'] = $this->sourceType;
        }
        if (isset($this->limit)) {
            $json['limit']       = $this->limit;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
