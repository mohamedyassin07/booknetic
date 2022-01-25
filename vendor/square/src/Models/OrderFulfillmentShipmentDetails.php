<?php



namespace Square\Models;

/**
 * Contains the details necessary to fulfill a shipment order.
 */
class OrderFulfillmentShipmentDetails implements \JsonSerializable
{
    /**
     * @var OrderFulfillmentRecipient|null
     */
    private $recipient;

    /**
     * @var string|null
     */
    private $carrier;

    /**
     * @var string|null
     */
    private $shippingNote;

    /**
     * @var string|null
     */
    private $shippingType;

    /**
     * @var string|null
     */
    private $trackingNumber;

    /**
     * @var string|null
     */
    private $trackingUrl;

    /**
     * @var string|null
     */
    private $placedAt;

    /**
     * @var string|null
     */
    private $inProgressAt;

    /**
     * @var string|null
     */
    private $packagedAt;

    /**
     * @var string|null
     */
    private $expectedShippedAt;

    /**
     * @var string|null
     */
    private $shippedAt;

    /**
     * @var string|null
     */
    private $canceledAt;

    /**
     * @var string|null
     */
    private $cancelReason;

    /**
     * @var string|null
     */
    private $failedAt;

    /**
     * @var string|null
     */
    private $failureReason;

    /**
     * Returns Recipient.
     *
     * Contains information about the recipient of a fulfillment.
     */
    public function getRecipient()
    {
        return $this->recipient;
    }

    /**
     * Sets Recipient.
     *
     * Contains information about the recipient of a fulfillment.
     *
     * @maps recipient
     */
    public function setRecipient(OrderFulfillmentRecipient $recipient = null)
    {
        $this->recipient = $recipient;
    }

    /**
     * Returns Carrier.
     *
     * The shipping carrier being used to ship this fulfillment (such as UPS, FedEx, or USPS).
     */
    public function getCarrier()
    {
        return $this->carrier;
    }

    /**
     * Sets Carrier.
     *
     * The shipping carrier being used to ship this fulfillment (such as UPS, FedEx, or USPS).
     *
     * @maps carrier
     */
    public function setCarrier($carrier = null)
    {
        $this->carrier = $carrier;
    }

    /**
     * Returns Shipping Note.
     *
     * A note with additional information for the shipping carrier.
     */
    public function getShippingNote()
    {
        return $this->shippingNote;
    }

    /**
     * Sets Shipping Note.
     *
     * A note with additional information for the shipping carrier.
     *
     * @maps shipping_note
     */
    public function setShippingNote($shippingNote = null)
    {
        $this->shippingNote = $shippingNote;
    }

    /**
     * Returns Shipping Type.
     *
     * A description of the type of shipping product purchased from the carrier
     * (such as First Class, Priority, or Express).
     */
    public function getShippingType()
    {
        return $this->shippingType;
    }

    /**
     * Sets Shipping Type.
     *
     * A description of the type of shipping product purchased from the carrier
     * (such as First Class, Priority, or Express).
     *
     * @maps shipping_type
     */
    public function setShippingType($shippingType = null)
    {
        $this->shippingType = $shippingType;
    }

    /**
     * Returns Tracking Number.
     *
     * The reference number provided by the carrier to track the shipment's progress.
     */
    public function getTrackingNumber()
    {
        return $this->trackingNumber;
    }

    /**
     * Sets Tracking Number.
     *
     * The reference number provided by the carrier to track the shipment's progress.
     *
     * @maps tracking_number
     */
    public function setTrackingNumber($trackingNumber = null)
    {
        $this->trackingNumber = $trackingNumber;
    }

    /**
     * Returns Tracking Url.
     *
     * A link to the tracking webpage on the carrier's website.
     */
    public function getTrackingUrl()
    {
        return $this->trackingUrl;
    }

    /**
     * Sets Tracking Url.
     *
     * A link to the tracking webpage on the carrier's website.
     *
     * @maps tracking_url
     */
    public function setTrackingUrl($trackingUrl = null)
    {
        $this->trackingUrl = $trackingUrl;
    }

    /**
     * Returns Placed At.
     *
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicating when the shipment was requested. The timestamp must be in RFC 3339 format
     * (for example, "2016-09-04T23:59:33.123Z").
     */
    public function getPlacedAt()
    {
        return $this->placedAt;
    }

    /**
     * Sets Placed At.
     *
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicating when the shipment was requested. The timestamp must be in RFC 3339 format
     * (for example, "2016-09-04T23:59:33.123Z").
     *
     * @maps placed_at
     */
    public function setPlacedAt($placedAt = null)
    {
        $this->placedAt = $placedAt;
    }

    /**
     * Returns In Progress At.
     *
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicating when this fulfillment was moved to the `RESERVED` state, which  indicates that
     * preparation
     * of this shipment has begun. The timestamp must be in RFC 3339 format (for example, "2016-09-04T23:59:
     * 33.123Z").
     */
    public function getInProgressAt()
    {
        return $this->inProgressAt;
    }

    /**
     * Sets In Progress At.
     *
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicating when this fulfillment was moved to the `RESERVED` state, which  indicates that
     * preparation
     * of this shipment has begun. The timestamp must be in RFC 3339 format (for example, "2016-09-04T23:59:
     * 33.123Z").
     *
     * @maps in_progress_at
     */
    public function setInProgressAt($inProgressAt = null)
    {
        $this->inProgressAt = $inProgressAt;
    }

    /**
     * Returns Packaged At.
     *
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicating when this fulfillment was moved to the `PREPARED` state, which indicates that the
     * fulfillment is packaged. The timestamp must be in RFC 3339 format (for example, "2016-09-04T23:59:33.
     * 123Z").
     */
    public function getPackagedAt()
    {
        return $this->packagedAt;
    }

    /**
     * Sets Packaged At.
     *
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicating when this fulfillment was moved to the `PREPARED` state, which indicates that the
     * fulfillment is packaged. The timestamp must be in RFC 3339 format (for example, "2016-09-04T23:59:33.
     * 123Z").
     *
     * @maps packaged_at
     */
    public function setPackagedAt($packagedAt = null)
    {
        $this->packagedAt = $packagedAt;
    }

    /**
     * Returns Expected Shipped At.
     *
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicating when the shipment is expected to be delivered to the shipping carrier.
     * The timestamp must be in RFC 3339 format (for example, "2016-09-04T23:59:33.123Z").
     */
    public function getExpectedShippedAt()
    {
        return $this->expectedShippedAt;
    }

    /**
     * Sets Expected Shipped At.
     *
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicating when the shipment is expected to be delivered to the shipping carrier.
     * The timestamp must be in RFC 3339 format (for example, "2016-09-04T23:59:33.123Z").
     *
     * @maps expected_shipped_at
     */
    public function setExpectedShippedAt($expectedShippedAt = null)
    {
        $this->expectedShippedAt = $expectedShippedAt;
    }

    /**
     * Returns Shipped At.
     *
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicating when this fulfillment was moved to the `COMPLETED` state, which indicates that
     * the fulfillment has been given to the shipping carrier. The timestamp must be in RFC 3339 format
     * (for example, "2016-09-04T23:59:33.123Z").
     */
    public function getShippedAt()
    {
        return $this->shippedAt;
    }

    /**
     * Sets Shipped At.
     *
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicating when this fulfillment was moved to the `COMPLETED` state, which indicates that
     * the fulfillment has been given to the shipping carrier. The timestamp must be in RFC 3339 format
     * (for example, "2016-09-04T23:59:33.123Z").
     *
     * @maps shipped_at
     */
    public function setShippedAt($shippedAt = null)
    {
        $this->shippedAt = $shippedAt;
    }

    /**
     * Returns Canceled At.
     *
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicating the shipment was canceled.
     * The timestamp must be in RFC 3339 format (for example, "2016-09-04T23:59:33.123Z").
     */
    public function getCanceledAt()
    {
        return $this->canceledAt;
    }

    /**
     * Sets Canceled At.
     *
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicating the shipment was canceled.
     * The timestamp must be in RFC 3339 format (for example, "2016-09-04T23:59:33.123Z").
     *
     * @maps canceled_at
     */
    public function setCanceledAt($canceledAt = null)
    {
        $this->canceledAt = $canceledAt;
    }

    /**
     * Returns Cancel Reason.
     *
     * A description of why the shipment was canceled.
     */
    public function getCancelReason()
    {
        return $this->cancelReason;
    }

    /**
     * Sets Cancel Reason.
     *
     * A description of why the shipment was canceled.
     *
     * @maps cancel_reason
     */
    public function setCancelReason($cancelReason = null)
    {
        $this->cancelReason = $cancelReason;
    }

    /**
     * Returns Failed At.
     *
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicating when the shipment failed to be completed. The timestamp must be in RFC 3339 format
     * (for example, "2016-09-04T23:59:33.123Z").
     */
    public function getFailedAt()
    {
        return $this->failedAt;
    }

    /**
     * Sets Failed At.
     *
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicating when the shipment failed to be completed. The timestamp must be in RFC 3339 format
     * (for example, "2016-09-04T23:59:33.123Z").
     *
     * @maps failed_at
     */
    public function setFailedAt($failedAt = null)
    {
        $this->failedAt = $failedAt;
    }

    /**
     * Returns Failure Reason.
     *
     * A description of why the shipment failed to be completed.
     */
    public function getFailureReason()
    {
        return $this->failureReason;
    }

    /**
     * Sets Failure Reason.
     *
     * A description of why the shipment failed to be completed.
     *
     * @maps failure_reason
     */
    public function setFailureReason($failureReason = null)
    {
        $this->failureReason = $failureReason;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->recipient)) {
            $json['recipient']           = $this->recipient;
        }
        if (isset($this->carrier)) {
            $json['carrier']             = $this->carrier;
        }
        if (isset($this->shippingNote)) {
            $json['shipping_note']       = $this->shippingNote;
        }
        if (isset($this->shippingType)) {
            $json['shipping_type']       = $this->shippingType;
        }
        if (isset($this->trackingNumber)) {
            $json['tracking_number']     = $this->trackingNumber;
        }
        if (isset($this->trackingUrl)) {
            $json['tracking_url']        = $this->trackingUrl;
        }
        if (isset($this->placedAt)) {
            $json['placed_at']           = $this->placedAt;
        }
        if (isset($this->inProgressAt)) {
            $json['in_progress_at']      = $this->inProgressAt;
        }
        if (isset($this->packagedAt)) {
            $json['packaged_at']         = $this->packagedAt;
        }
        if (isset($this->expectedShippedAt)) {
            $json['expected_shipped_at'] = $this->expectedShippedAt;
        }
        if (isset($this->shippedAt)) {
            $json['shipped_at']          = $this->shippedAt;
        }
        if (isset($this->canceledAt)) {
            $json['canceled_at']         = $this->canceledAt;
        }
        if (isset($this->cancelReason)) {
            $json['cancel_reason']       = $this->cancelReason;
        }
        if (isset($this->failedAt)) {
            $json['failed_at']           = $this->failedAt;
        }
        if (isset($this->failureReason)) {
            $json['failure_reason']      = $this->failureReason;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
