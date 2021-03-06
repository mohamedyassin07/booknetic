<?php



namespace Square\Models;

class BusinessBookingProfile implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $sellerId;

    /**
     * @var string|null
     */
    private $createdAt;

    /**
     * @var bool|null
     */
    private $bookingEnabled;

    /**
     * @var string|null
     */
    private $customerTimezoneChoice;

    /**
     * @var string|null
     */
    private $bookingPolicy;

    /**
     * @var bool|null
     */
    private $allowUserCancel;

    /**
     * @var BusinessAppointmentSettings|null
     */
    private $businessAppointmentSettings;

    /**
     * Returns Seller Id.
     *
     * The ID of the seller, obtainable using the Merchants API.
     */
    public function getSellerId()
    {
        return $this->sellerId;
    }

    /**
     * Sets Seller Id.
     *
     * The ID of the seller, obtainable using the Merchants API.
     *
     * @maps seller_id
     */
    public function setSellerId($sellerId = null)
    {
        $this->sellerId = $sellerId;
    }

    /**
     * Returns Created At.
     *
     * The RFC 3339 timestamp specifying the booking's creation time.
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Sets Created At.
     *
     * The RFC 3339 timestamp specifying the booking's creation time.
     *
     * @maps created_at
     */
    public function setCreatedAt($createdAt = null)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Returns Booking Enabled.
     *
     * Indicates whether the seller is open for booking.
     */
    public function getBookingEnabled()
    {
        return $this->bookingEnabled;
    }

    /**
     * Sets Booking Enabled.
     *
     * Indicates whether the seller is open for booking.
     *
     * @maps booking_enabled
     */
    public function setBookingEnabled($bookingEnabled = null)
    {
        $this->bookingEnabled = $bookingEnabled;
    }

    /**
     * Returns Customer Timezone Choice.
     *
     * Choices of customer-facing time zone used for bookings.
     */
    public function getCustomerTimezoneChoice()
    {
        return $this->customerTimezoneChoice;
    }

    /**
     * Sets Customer Timezone Choice.
     *
     * Choices of customer-facing time zone used for bookings.
     *
     * @maps customer_timezone_choice
     */
    public function setCustomerTimezoneChoice($customerTimezoneChoice = null)
    {
        $this->customerTimezoneChoice = $customerTimezoneChoice;
    }

    /**
     * Returns Booking Policy.
     *
     * Policies for accepting bookings.
     */
    public function getBookingPolicy()
    {
        return $this->bookingPolicy;
    }

    /**
     * Sets Booking Policy.
     *
     * Policies for accepting bookings.
     *
     * @maps booking_policy
     */
    public function setBookingPolicy($bookingPolicy = null)
    {
        $this->bookingPolicy = $bookingPolicy;
    }

    /**
     * Returns Allow User Cancel.
     *
     * Indicates whether customers can cancel or reschedule their own bookings (`true`) or not (`false`).
     */
    public function getAllowUserCancel()
    {
        return $this->allowUserCancel;
    }

    /**
     * Sets Allow User Cancel.
     *
     * Indicates whether customers can cancel or reschedule their own bookings (`true`) or not (`false`).
     *
     * @maps allow_user_cancel
     */
    public function setAllowUserCancel($allowUserCancel = null)
    {
        $this->allowUserCancel = $allowUserCancel;
    }

    /**
     * Returns Business Appointment Settings.
     *
     * The service appointment settings, including where and how the service is provided.
     */
    public function getBusinessAppointmentSettings()
    {
        return $this->businessAppointmentSettings;
    }

    /**
     * Sets Business Appointment Settings.
     *
     * The service appointment settings, including where and how the service is provided.
     *
     * @maps business_appointment_settings
     */
    public function setBusinessAppointmentSettings(BusinessAppointmentSettings $businessAppointmentSettings = null)
    {
        $this->businessAppointmentSettings = $businessAppointmentSettings;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->sellerId)) {
            $json['seller_id']                     = $this->sellerId;
        }
        if (isset($this->createdAt)) {
            $json['created_at']                    = $this->createdAt;
        }
        if (isset($this->bookingEnabled)) {
            $json['booking_enabled']               = $this->bookingEnabled;
        }
        if (isset($this->customerTimezoneChoice)) {
            $json['customer_timezone_choice']      = $this->customerTimezoneChoice;
        }
        if (isset($this->bookingPolicy)) {
            $json['booking_policy']                = $this->bookingPolicy;
        }
        if (isset($this->allowUserCancel)) {
            $json['allow_user_cancel']             = $this->allowUserCancel;
        }
        if (isset($this->businessAppointmentSettings)) {
            $json['business_appointment_settings'] = $this->businessAppointmentSettings;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
