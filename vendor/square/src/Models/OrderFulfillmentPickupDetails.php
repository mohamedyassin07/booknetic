<?php



namespace Square\Models;

/**
 * Contains details necessary to fulfill a pickup order.
 */
class OrderFulfillmentPickupDetails implements \JsonSerializable
{
    /**
     * @var OrderFulfillmentRecipient|null
     */
    private $recipient;

    /**
     * @var string|null
     */
    private $expiresAt;

    /**
     * @var string|null
     */
    private $autoCompleteDuration;

    /**
     * @var string|null
     */
    private $scheduleType;

    /**
     * @var string|null
     */
    private $pickupAt;

    /**
     * @var string|null
     */
    private $pickupWindowDuration;

    /**
     * @var string|null
     */
    private $prepTimeDuration;

    /**
     * @var string|null
     */
    private $note;

    /**
     * @var string|null
     */
    private $placedAt;

    /**
     * @var string|null
     */
    private $acceptedAt;

    /**
     * @var string|null
     */
    private $rejectedAt;

    /**
     * @var string|null
     */
    private $readyAt;

    /**
     * @var string|null
     */
    private $expiredAt;

    /**
     * @var string|null
     */
    private $pickedUpAt;

    /**
     * @var string|null
     */
    private $canceledAt;

    /**
     * @var string|null
     */
    private $cancelReason;

    /**
     * @var bool|null
     */
    private $isCurbsidePickup;

    /**
     * @var OrderFulfillmentPickupDetailsCurbsidePickupDetails|null
     */
    private $curbsidePickupDetails;

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
     * Returns Expires At.
     *
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicating when this fulfillment expires if it is not accepted. The timestamp must be in RFC 3339
     * format
     * (for example, "2016-09-04T23:59:33.123Z"). The expiration time can only be set up to 7 days in the
     * future.
     * If `expires_at` is not set, this pickup fulfillment is automatically accepted when
     * placed.
     */
    public function getExpiresAt()
    {
        return $this->expiresAt;
    }

    /**
     * Sets Expires At.
     *
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicating when this fulfillment expires if it is not accepted. The timestamp must be in RFC 3339
     * format
     * (for example, "2016-09-04T23:59:33.123Z"). The expiration time can only be set up to 7 days in the
     * future.
     * If `expires_at` is not set, this pickup fulfillment is automatically accepted when
     * placed.
     *
     * @maps expires_at
     */
    public function setExpiresAt($expiresAt = null)
    {
        $this->expiresAt = $expiresAt;
    }

    /**
     * Returns Auto Complete Duration.
     *
     * The duration of time after which an open and accepted pickup fulfillment
     * is automatically moved to the `COMPLETED` state. The duration must be in RFC 3339
     * format (for example, "P1W3D").
     *
     * If not set, this pickup fulfillment remains accepted until it is canceled or completed.
     */
    public function getAutoCompleteDuration()
    {
        return $this->autoCompleteDuration;
    }

    /**
     * Sets Auto Complete Duration.
     *
     * The duration of time after which an open and accepted pickup fulfillment
     * is automatically moved to the `COMPLETED` state. The duration must be in RFC 3339
     * format (for example, "P1W3D").
     *
     * If not set, this pickup fulfillment remains accepted until it is canceled or completed.
     *
     * @maps auto_complete_duration
     */
    public function setAutoCompleteDuration($autoCompleteDuration = null)
    {
        $this->autoCompleteDuration = $autoCompleteDuration;
    }

    /**
     * Returns Schedule Type.
     *
     * The schedule type of the pickup fulfillment.
     */
    public function getScheduleType()
    {
        return $this->scheduleType;
    }

    /**
     * Sets Schedule Type.
     *
     * The schedule type of the pickup fulfillment.
     *
     * @maps schedule_type
     */
    public function setScheduleType($scheduleType = null)
    {
        $this->scheduleType = $scheduleType;
    }

    /**
     * Returns Pickup At.
     *
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * that represents the start of the pickup window. Must be in RFC 3339 timestamp format, e.g.,
     * "2016-09-04T23:59:33.123Z".
     *
     * For fulfillments with the schedule type `ASAP`, this is automatically set
     * to the current time plus the expected duration to prepare the fulfillment.
     */
    public function getPickupAt()
    {
        return $this->pickupAt;
    }

    /**
     * Sets Pickup At.
     *
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * that represents the start of the pickup window. Must be in RFC 3339 timestamp format, e.g.,
     * "2016-09-04T23:59:33.123Z".
     *
     * For fulfillments with the schedule type `ASAP`, this is automatically set
     * to the current time plus the expected duration to prepare the fulfillment.
     *
     * @maps pickup_at
     */
    public function setPickupAt($pickupAt = null)
    {
        $this->pickupAt = $pickupAt;
    }

    /**
     * Returns Pickup Window Duration.
     *
     * The window of time in which the order should be picked up after the `pickup_at` timestamp.
     * Must be in RFC 3339 duration format, e.g., "P1W3D". Can be used as an
     * informational guideline for merchants.
     */
    public function getPickupWindowDuration()
    {
        return $this->pickupWindowDuration;
    }

    /**
     * Sets Pickup Window Duration.
     *
     * The window of time in which the order should be picked up after the `pickup_at` timestamp.
     * Must be in RFC 3339 duration format, e.g., "P1W3D". Can be used as an
     * informational guideline for merchants.
     *
     * @maps pickup_window_duration
     */
    public function setPickupWindowDuration($pickupWindowDuration = null)
    {
        $this->pickupWindowDuration = $pickupWindowDuration;
    }

    /**
     * Returns Prep Time Duration.
     *
     * The duration of time it takes to prepare this fulfillment.
     * The duration must be in RFC 3339 format (for example, "P1W3D").
     */
    public function getPrepTimeDuration()
    {
        return $this->prepTimeDuration;
    }

    /**
     * Sets Prep Time Duration.
     *
     * The duration of time it takes to prepare this fulfillment.
     * The duration must be in RFC 3339 format (for example, "P1W3D").
     *
     * @maps prep_time_duration
     */
    public function setPrepTimeDuration($prepTimeDuration = null)
    {
        $this->prepTimeDuration = $prepTimeDuration;
    }

    /**
     * Returns Note.
     *
     * A note meant to provide additional instructions about the pickup
     * fulfillment displayed in the Square Point of Sale application and set by the API.
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Sets Note.
     *
     * A note meant to provide additional instructions about the pickup
     * fulfillment displayed in the Square Point of Sale application and set by the API.
     *
     * @maps note
     */
    public function setNote($note = null)
    {
        $this->note = $note;
    }

    /**
     * Returns Placed At.
     *
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicating when the fulfillment was placed. The timestamp must be in RFC 3339 format
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
     * indicating when the fulfillment was placed. The timestamp must be in RFC 3339 format
     * (for example, "2016-09-04T23:59:33.123Z").
     *
     * @maps placed_at
     */
    public function setPlacedAt($placedAt = null)
    {
        $this->placedAt = $placedAt;
    }

    /**
     * Returns Accepted At.
     *
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicating when the fulfillment was accepted. The timestamp must be in RFC 3339 format
     * (for example, "2016-09-04T23:59:33.123Z").
     */
    public function getAcceptedAt()
    {
        return $this->acceptedAt;
    }

    /**
     * Sets Accepted At.
     *
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicating when the fulfillment was accepted. The timestamp must be in RFC 3339 format
     * (for example, "2016-09-04T23:59:33.123Z").
     *
     * @maps accepted_at
     */
    public function setAcceptedAt($acceptedAt = null)
    {
        $this->acceptedAt = $acceptedAt;
    }

    /**
     * Returns Rejected At.
     *
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicating when the fulfillment was rejected. The timestamp must be in RFC 3339 format
     * (for example, "2016-09-04T23:59:33.123Z").
     */
    public function getRejectedAt()
    {
        return $this->rejectedAt;
    }

    /**
     * Sets Rejected At.
     *
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicating when the fulfillment was rejected. The timestamp must be in RFC 3339 format
     * (for example, "2016-09-04T23:59:33.123Z").
     *
     * @maps rejected_at
     */
    public function setRejectedAt($rejectedAt = null)
    {
        $this->rejectedAt = $rejectedAt;
    }

    /**
     * Returns Ready At.
     *
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicating when the fulfillment is marked as ready for pickup. The timestamp must be in RFC 3339
     * format
     * (for example, "2016-09-04T23:59:33.123Z").
     */
    public function getReadyAt()
    {
        return $this->readyAt;
    }

    /**
     * Sets Ready At.
     *
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicating when the fulfillment is marked as ready for pickup. The timestamp must be in RFC 3339
     * format
     * (for example, "2016-09-04T23:59:33.123Z").
     *
     * @maps ready_at
     */
    public function setReadyAt($readyAt = null)
    {
        $this->readyAt = $readyAt;
    }

    /**
     * Returns Expired At.
     *
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicating when the fulfillment expired. The timestamp must be in RFC 3339 format
     * (for example, "2016-09-04T23:59:33.123Z").
     */
    public function getExpiredAt()
    {
        return $this->expiredAt;
    }

    /**
     * Sets Expired At.
     *
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicating when the fulfillment expired. The timestamp must be in RFC 3339 format
     * (for example, "2016-09-04T23:59:33.123Z").
     *
     * @maps expired_at
     */
    public function setExpiredAt($expiredAt = null)
    {
        $this->expiredAt = $expiredAt;
    }

    /**
     * Returns Picked up At.
     *
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicating when the fulfillment was picked up by the recipient. The timestamp must be in RFC 3339
     * format
     * (for example, "2016-09-04T23:59:33.123Z").
     */
    public function getPickedUpAt()
    {
        return $this->pickedUpAt;
    }

    /**
     * Sets Picked up At.
     *
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicating when the fulfillment was picked up by the recipient. The timestamp must be in RFC 3339
     * format
     * (for example, "2016-09-04T23:59:33.123Z").
     *
     * @maps picked_up_at
     */
    public function setPickedUpAt($pickedUpAt = null)
    {
        $this->pickedUpAt = $pickedUpAt;
    }

    /**
     * Returns Canceled At.
     *
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicating when the fulfillment was canceled. The timestamp must be in RFC 3339 format
     * (for example, "2016-09-04T23:59:33.123Z").
     */
    public function getCanceledAt()
    {
        return $this->canceledAt;
    }

    /**
     * Sets Canceled At.
     *
     * The [timestamp](https://developer.squareup.com/docs/build-basics/working-with-dates)
     * indicating when the fulfillment was canceled. The timestamp must be in RFC 3339 format
     * (for example, "2016-09-04T23:59:33.123Z").
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
     * A description of why the pickup was canceled. The maximum length: 100 characters.
     */
    public function getCancelReason()
    {
        return $this->cancelReason;
    }

    /**
     * Sets Cancel Reason.
     *
     * A description of why the pickup was canceled. The maximum length: 100 characters.
     *
     * @maps cancel_reason
     */
    public function setCancelReason($cancelReason = null)
    {
        $this->cancelReason = $cancelReason;
    }

    /**
     * Returns Is Curbside Pickup.
     *
     * If set to `true`, indicates that this pickup order is for curbside pickup, not in-store pickup.
     */
    public function getIsCurbsidePickup()
    {
        return $this->isCurbsidePickup;
    }

    /**
     * Sets Is Curbside Pickup.
     *
     * If set to `true`, indicates that this pickup order is for curbside pickup, not in-store pickup.
     *
     * @maps is_curbside_pickup
     */
    public function setIsCurbsidePickup($isCurbsidePickup = null)
    {
        $this->isCurbsidePickup = $isCurbsidePickup;
    }

    /**
     * Returns Curbside Pickup Details.
     *
     * Specific details for curbside pickup.
     */
    public function getCurbsidePickupDetails()
    {
        return $this->curbsidePickupDetails;
    }

    /**
     * Sets Curbside Pickup Details.
     *
     * Specific details for curbside pickup.
     *
     * @maps curbside_pickup_details
     */
    public function setCurbsidePickupDetails(
        OrderFulfillmentPickupDetailsCurbsidePickupDetails $curbsidePickupDetails = null
    ) {
        $this->curbsidePickupDetails = $curbsidePickupDetails;
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
            $json['recipient']               = $this->recipient;
        }
        if (isset($this->expiresAt)) {
            $json['expires_at']              = $this->expiresAt;
        }
        if (isset($this->autoCompleteDuration)) {
            $json['auto_complete_duration']  = $this->autoCompleteDuration;
        }
        if (isset($this->scheduleType)) {
            $json['schedule_type']           = $this->scheduleType;
        }
        if (isset($this->pickupAt)) {
            $json['pickup_at']               = $this->pickupAt;
        }
        if (isset($this->pickupWindowDuration)) {
            $json['pickup_window_duration']  = $this->pickupWindowDuration;
        }
        if (isset($this->prepTimeDuration)) {
            $json['prep_time_duration']      = $this->prepTimeDuration;
        }
        if (isset($this->note)) {
            $json['note']                    = $this->note;
        }
        if (isset($this->placedAt)) {
            $json['placed_at']               = $this->placedAt;
        }
        if (isset($this->acceptedAt)) {
            $json['accepted_at']             = $this->acceptedAt;
        }
        if (isset($this->rejectedAt)) {
            $json['rejected_at']             = $this->rejectedAt;
        }
        if (isset($this->readyAt)) {
            $json['ready_at']                = $this->readyAt;
        }
        if (isset($this->expiredAt)) {
            $json['expired_at']              = $this->expiredAt;
        }
        if (isset($this->pickedUpAt)) {
            $json['picked_up_at']            = $this->pickedUpAt;
        }
        if (isset($this->canceledAt)) {
            $json['canceled_at']             = $this->canceledAt;
        }
        if (isset($this->cancelReason)) {
            $json['cancel_reason']           = $this->cancelReason;
        }
        if (isset($this->isCurbsidePickup)) {
            $json['is_curbside_pickup']      = $this->isCurbsidePickup;
        }
        if (isset($this->curbsidePickupDetails)) {
            $json['curbside_pickup_details'] = $this->curbsidePickupDetails;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
