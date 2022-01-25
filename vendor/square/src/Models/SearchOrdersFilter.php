<?php



namespace Square\Models;

/**
 * Filtering criteria to use for a `SearchOrders` request. Multiple filters
 * are ANDed together.
 */
class SearchOrdersFilter implements \JsonSerializable
{
    /**
     * @var SearchOrdersStateFilter|null
     */
    private $stateFilter;

    /**
     * @var SearchOrdersDateTimeFilter|null
     */
    private $dateTimeFilter;

    /**
     * @var SearchOrdersFulfillmentFilter|null
     */
    private $fulfillmentFilter;

    /**
     * @var SearchOrdersSourceFilter|null
     */
    private $sourceFilter;

    /**
     * @var SearchOrdersCustomerFilter|null
     */
    private $customerFilter;

    /**
     * Returns State Filter.
     *
     * Filter by the current order `state`.
     */
    public function getStateFilter()
    {
        return $this->stateFilter;
    }

    /**
     * Sets State Filter.
     *
     * Filter by the current order `state`.
     *
     * @maps state_filter
     */
    public function setStateFilter(SearchOrdersStateFilter $stateFilter = null)
    {
        $this->stateFilter = $stateFilter;
    }

    /**
     * Returns Date Time Filter.
     *
     * Filter for `Order` objects based on whether their `CREATED_AT`,
     * `CLOSED_AT`, or `UPDATED_AT` timestamps fall within a specified time range.
     * You can specify the time range and which timestamp to filter for. You can filter
     * for only one time range at a time.
     *
     * For each time range, the start time and end time are inclusive. If the end time
     * is absent, it defaults to the time of the first request for the cursor.
     *
     * __Important:__ If you use the `DateTimeFilter` in a `SearchOrders` query,
     * you must set the `sort_field` in [OrdersSort]($m/SearchOrdersSort)
     * to the same field you filter for. For example, if you set the `CLOSED_AT` field
     * in `DateTimeFilter`, you must set the `sort_field` in `SearchOrdersSort` to
     * `CLOSED_AT`. Otherwise, `SearchOrders` throws an error.
     * [Learn more about filtering orders by time range.](https://developer.squareup.com/docs/orders-
     * api/manage-orders#important-note-on-filtering-orders-by-time-range)
     */
    public function getDateTimeFilter()
    {
        return $this->dateTimeFilter;
    }

    /**
     * Sets Date Time Filter.
     *
     * Filter for `Order` objects based on whether their `CREATED_AT`,
     * `CLOSED_AT`, or `UPDATED_AT` timestamps fall within a specified time range.
     * You can specify the time range and which timestamp to filter for. You can filter
     * for only one time range at a time.
     *
     * For each time range, the start time and end time are inclusive. If the end time
     * is absent, it defaults to the time of the first request for the cursor.
     *
     * __Important:__ If you use the `DateTimeFilter` in a `SearchOrders` query,
     * you must set the `sort_field` in [OrdersSort]($m/SearchOrdersSort)
     * to the same field you filter for. For example, if you set the `CLOSED_AT` field
     * in `DateTimeFilter`, you must set the `sort_field` in `SearchOrdersSort` to
     * `CLOSED_AT`. Otherwise, `SearchOrders` throws an error.
     * [Learn more about filtering orders by time range.](https://developer.squareup.com/docs/orders-
     * api/manage-orders#important-note-on-filtering-orders-by-time-range)
     *
     * @maps date_time_filter
     */
    public function setDateTimeFilter(SearchOrdersDateTimeFilter $dateTimeFilter = null)
    {
        $this->dateTimeFilter = $dateTimeFilter;
    }

    /**
     * Returns Fulfillment Filter.
     *
     * Filter based on [order fulfillment]($m/OrderFulfillment) information.
     */
    public function getFulfillmentFilter()
    {
        return $this->fulfillmentFilter;
    }

    /**
     * Sets Fulfillment Filter.
     *
     * Filter based on [order fulfillment]($m/OrderFulfillment) information.
     *
     * @maps fulfillment_filter
     */
    public function setFulfillmentFilter(SearchOrdersFulfillmentFilter $fulfillmentFilter = null)
    {
        $this->fulfillmentFilter = $fulfillmentFilter;
    }

    /**
     * Returns Source Filter.
     *
     * A filter based on order `source` information.
     */
    public function getSourceFilter()
    {
        return $this->sourceFilter;
    }

    /**
     * Sets Source Filter.
     *
     * A filter based on order `source` information.
     *
     * @maps source_filter
     */
    public function setSourceFilter(SearchOrdersSourceFilter $sourceFilter = null)
    {
        $this->sourceFilter = $sourceFilter;
    }

    /**
     * Returns Customer Filter.
     *
     * A filter based on the order `customer_id` and any tender `customer_id`
     * associated with the order. It does not filter based on the
     * [FulfillmentRecipient]($m/OrderFulfillmentRecipient) `customer_id`.
     */
    public function getCustomerFilter()
    {
        return $this->customerFilter;
    }

    /**
     * Sets Customer Filter.
     *
     * A filter based on the order `customer_id` and any tender `customer_id`
     * associated with the order. It does not filter based on the
     * [FulfillmentRecipient]($m/OrderFulfillmentRecipient) `customer_id`.
     *
     * @maps customer_filter
     */
    public function setCustomerFilter(SearchOrdersCustomerFilter $customerFilter = null)
    {
        $this->customerFilter = $customerFilter;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->stateFilter)) {
            $json['state_filter']       = $this->stateFilter;
        }
        if (isset($this->dateTimeFilter)) {
            $json['date_time_filter']   = $this->dateTimeFilter;
        }
        if (isset($this->fulfillmentFilter)) {
            $json['fulfillment_filter'] = $this->fulfillmentFilter;
        }
        if (isset($this->sourceFilter)) {
            $json['source_filter']      = $this->sourceFilter;
        }
        if (isset($this->customerFilter)) {
            $json['customer_filter']    = $this->customerFilter;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}