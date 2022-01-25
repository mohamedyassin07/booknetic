<?php



namespace Square\Models;

/**
 * A request to accumulate points for a purchase.
 */
class AccumulateLoyaltyPointsRequest implements \JsonSerializable
{
    /**
     * @var LoyaltyEventAccumulatePoints
     */
    private $accumulatePoints;

    /**
     * @var string
     */
    private $idempotencyKey;

    /**
     * @var string
     */
    private $locationId;

    /**
     * @param LoyaltyEventAccumulatePoints $accumulatePoints
     * @param $idempotencyKey
     * @param $locationId
     */
    public function __construct(
        LoyaltyEventAccumulatePoints $accumulatePoints,
        $idempotencyKey,
        $locationId
    ) {
        $this->accumulatePoints = $accumulatePoints;
        $this->idempotencyKey = $idempotencyKey;
        $this->locationId = $locationId;
    }

    /**
     * Returns Accumulate Points.
     *
     * Provides metadata when the event `type` is `ACCUMULATE_POINTS`.
     */
    public function getAccumulatePoints()
    {
        return $this->accumulatePoints;
    }

    /**
     * Sets Accumulate Points.
     *
     * Provides metadata when the event `type` is `ACCUMULATE_POINTS`.
     *
     * @required
     * @maps accumulate_points
     */
    public function setAccumulatePoints(LoyaltyEventAccumulatePoints $accumulatePoints)
    {
        $this->accumulatePoints = $accumulatePoints;
    }

    /**
     * Returns Idempotency Key.
     *
     * A unique string that identifies the `AccumulateLoyaltyPoints` request.
     * Keys can be any valid string but must be unique for every request.
     */
    public function getIdempotencyKey()
    {
        return $this->idempotencyKey;
    }

    /**
     * Sets Idempotency Key.
     *
     * A unique string that identifies the `AccumulateLoyaltyPoints` request.
     * Keys can be any valid string but must be unique for every request.
     *
     * @required
     * @maps idempotency_key
     */
    public function setIdempotencyKey($idempotencyKey)
    {
        $this->idempotencyKey = $idempotencyKey;
    }

    /**
     * Returns Location Id.
     *
     * The [location]($m/Location) where the purchase was made.
     */
    public function getLocationId()
    {
        return $this->locationId;
    }

    /**
     * Sets Location Id.
     *
     * The [location]($m/Location) where the purchase was made.
     *
     * @required
     * @maps location_id
     */
    public function setLocationId($locationId)
    {
        $this->locationId = $locationId;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['accumulate_points'] = $this->accumulatePoints;
        $json['idempotency_key']   = $this->idempotencyKey;
        $json['location_id']       = $this->locationId;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
