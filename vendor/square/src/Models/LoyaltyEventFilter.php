<?php



namespace Square\Models;

/**
 * The filtering criteria. If the request specifies multiple filters,
 * the endpoint uses a logical AND to evaluate them.
 */
class LoyaltyEventFilter implements \JsonSerializable
{
    /**
     * @var LoyaltyEventLoyaltyAccountFilter|null
     */
    private $loyaltyAccountFilter;

    /**
     * @var LoyaltyEventTypeFilter|null
     */
    private $typeFilter;

    /**
     * @var LoyaltyEventDateTimeFilter|null
     */
    private $dateTimeFilter;

    /**
     * @var LoyaltyEventLocationFilter|null
     */
    private $locationFilter;

    /**
     * @var LoyaltyEventOrderFilter|null
     */
    private $orderFilter;

    /**
     * Returns Loyalty Account Filter.
     *
     * Filter events by loyalty account.
     */
    public function getLoyaltyAccountFilter()
    {
        return $this->loyaltyAccountFilter;
    }

    /**
     * Sets Loyalty Account Filter.
     *
     * Filter events by loyalty account.
     *
     * @maps loyalty_account_filter
     */
    public function setLoyaltyAccountFilter(LoyaltyEventLoyaltyAccountFilter $loyaltyAccountFilter = null)
    {
        $this->loyaltyAccountFilter = $loyaltyAccountFilter;
    }

    /**
     * Returns Type Filter.
     *
     * Filter events by event type.
     */
    public function getTypeFilter()
    {
        return $this->typeFilter;
    }

    /**
     * Sets Type Filter.
     *
     * Filter events by event type.
     *
     * @maps type_filter
     */
    public function setTypeFilter(LoyaltyEventTypeFilter $typeFilter = null)
    {
        $this->typeFilter = $typeFilter;
    }

    /**
     * Returns Date Time Filter.
     *
     * Filter events by date time range.
     */
    public function getDateTimeFilter()
    {
        return $this->dateTimeFilter;
    }

    /**
     * Sets Date Time Filter.
     *
     * Filter events by date time range.
     *
     * @maps date_time_filter
     */
    public function setDateTimeFilter(LoyaltyEventDateTimeFilter $dateTimeFilter = null)
    {
        $this->dateTimeFilter = $dateTimeFilter;
    }

    /**
     * Returns Location Filter.
     *
     * Filter events by location.
     */
    public function getLocationFilter()
    {
        return $this->locationFilter;
    }

    /**
     * Sets Location Filter.
     *
     * Filter events by location.
     *
     * @maps location_filter
     */
    public function setLocationFilter(LoyaltyEventLocationFilter $locationFilter = null)
    {
        $this->locationFilter = $locationFilter;
    }

    /**
     * Returns Order Filter.
     *
     * Filter events by the order associated with the event.
     */
    public function getOrderFilter()
    {
        return $this->orderFilter;
    }

    /**
     * Sets Order Filter.
     *
     * Filter events by the order associated with the event.
     *
     * @maps order_filter
     */
    public function setOrderFilter(LoyaltyEventOrderFilter $orderFilter = null)
    {
        $this->orderFilter = $orderFilter;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->loyaltyAccountFilter)) {
            $json['loyalty_account_filter'] = $this->loyaltyAccountFilter;
        }
        if (isset($this->typeFilter)) {
            $json['type_filter']            = $this->typeFilter;
        }
        if (isset($this->dateTimeFilter)) {
            $json['date_time_filter']       = $this->dateTimeFilter;
        }
        if (isset($this->locationFilter)) {
            $json['location_filter']        = $this->locationFilter;
        }
        if (isset($this->orderFilter)) {
            $json['order_filter']           = $this->orderFilter;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
