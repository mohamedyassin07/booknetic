<?php



namespace Square\Models;

/**
 * Describes a request to cancel a payment using
 * [CancelPaymentByIdempotencyKey]($e/Payments/CancelPaymentByIdempotencyKey).
 */
class CancelPaymentByIdempotencyKeyRequest implements \JsonSerializable
{
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
     * Returns Idempotency Key.
     *
     * The `idempotency_key` identifying the payment to be canceled.
     */
    public function getIdempotencyKey()
    {
        return $this->idempotencyKey;
    }

    /**
     * Sets Idempotency Key.
     *
     * The `idempotency_key` identifying the payment to be canceled.
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
        $json['idempotency_key'] = $this->idempotencyKey;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
