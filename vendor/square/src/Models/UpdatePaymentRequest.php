<?php



namespace Square\Models;

/**
 * Describes a request to update a payment using
 * [UpdatePayment]($e/Payments/UpdatePayment).
 */
class UpdatePaymentRequest implements \JsonSerializable
{
    /**
     * @var Payment|null
     */
    private $payment;

    /**
     * @var string
     */
    private $idempotencyKey;

    /**
     * @param $idempotencyKey
     */
    public function __construct($idempotencyKey)
    {
        $this->idempotencyKey = $idempotencyKey;
    }

    /**
     * Returns Payment.
     *
     * Represents a payment processed by the Square API.
     */
    public function getPayment()
    {
        return $this->payment;
    }

    /**
     * Sets Payment.
     *
     * Represents a payment processed by the Square API.
     *
     * @maps payment
     */
    public function setPayment(Payment $payment = null)
    {
        $this->payment = $payment;
    }

    /**
     * Returns Idempotency Key.
     *
     * A unique string that identifies this `UpdatePayment` request. Keys can be any valid string
     * but must be unique for every `UpdatePayment` request.
     *
     * The maximum is 45 characters.
     *
     * For more information, see [Idempotency](https://developer.squareup.
     * com/docs/basics/api101/idempotency).
     */
    public function getIdempotencyKey()
    {
        return $this->idempotencyKey;
    }

    /**
     * Sets Idempotency Key.
     *
     * A unique string that identifies this `UpdatePayment` request. Keys can be any valid string
     * but must be unique for every `UpdatePayment` request.
     *
     * The maximum is 45 characters.
     *
     * For more information, see [Idempotency](https://developer.squareup.
     * com/docs/basics/api101/idempotency).
     *
     * @required
     * @maps idempotency_key
     */
    public function setIdempotencyKey($idempotencyKey)
    {
        $this->idempotencyKey = $idempotencyKey;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->payment)) {
            $json['payment']     = $this->payment;
        }
        $json['idempotency_key'] = $this->idempotencyKey;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
