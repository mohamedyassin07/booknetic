<?php



namespace Square\Models;

class CancelBookingRequest implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $idempotencyKey;

    /**
     * @var int|null
     */
    private $bookingVersion;

    /**
     * Returns Idempotency Key.
     *
     * A unique key to make this request an idempotent operation.
     */
    public function getIdempotencyKey()
    {
        return $this->idempotencyKey;
    }

    /**
     * Sets Idempotency Key.
     *
     * A unique key to make this request an idempotent operation.
     *
     * @maps idempotency_key
     */
    public function setIdempotencyKey($idempotencyKey = null)
    {
        $this->idempotencyKey = $idempotencyKey;
    }

    /**
     * Returns Booking Version.
     *
     * The revision number for the booking used for optimistic concurrency.
     */
    public function getBookingVersion()
    {
        return $this->bookingVersion;
    }

    /**
     * Sets Booking Version.
     *
     * The revision number for the booking used for optimistic concurrency.
     *
     * @maps booking_version
     */
    public function setBookingVersion($bookingVersion)
    {
        $this->bookingVersion = $bookingVersion;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->idempotencyKey)) {
            $json['idempotency_key'] = $this->idempotencyKey;
        }
        if (isset($this->bookingVersion)) {
            $json['booking_version'] = $this->bookingVersion;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
