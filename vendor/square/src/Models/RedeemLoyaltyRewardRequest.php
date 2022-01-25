<?php



namespace Square\Models;

/**
 * A request to redeem a loyalty reward.
 */
class RedeemLoyaltyRewardRequest implements \JsonSerializable
{
    /**
     * @var string
     */
    private $idempotencyKey;

    /**
     * @var string
     */
    private $locationId;

    /**
     * @param $idempotencyKey
     * @param $locationId
     */
    public function __construct($idempotencyKey, $locationId)
    {
        $this->idempotencyKey = $idempotencyKey;
        $this->locationId = $locationId;
    }

    /**
     * Returns Idempotency Key.
     *
     * A unique string that identifies this `RedeemLoyaltyReward` request.
     * Keys can be any valid string, but must be unique for every request.
     */
    public function getIdempotencyKey()
    {
        return $this->idempotencyKey;
    }

    /**
     * Sets Idempotency Key.
     *
     * A unique string that identifies this `RedeemLoyaltyReward` request.
     * Keys can be any valid string, but must be unique for every request.
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
     * The ID of the [location]($m/Location) where the reward is redeemed.
     */
    public function getLocationId()
    {
        return $this->locationId;
    }

    /**
     * Sets Location Id.
     *
     * The ID of the [location]($m/Location) where the reward is redeemed.
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
        $json['idempotency_key'] = $this->idempotencyKey;
        $json['location_id']     = $this->locationId;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
