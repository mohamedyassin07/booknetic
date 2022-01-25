<?php



namespace Square\Models;

/**
 * A request to create a gift card.
 */
class CreateGiftCardRequest implements \JsonSerializable
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
     * @var GiftCard
     */
    private $giftCard;

    /**
     * @param $idempotencyKey
     * @param $locationId
     * @param GiftCard $giftCard
     */
    public function __construct($idempotencyKey, $locationId, GiftCard $giftCard)
    {
        $this->idempotencyKey = $idempotencyKey;
        $this->locationId = $locationId;
        $this->giftCard = $giftCard;
    }

    /**
     * Returns Idempotency Key.
     *
     * A unique string that identifies the `CreateGiftCard` request.
     */
    public function getIdempotencyKey()
    {
        return $this->idempotencyKey;
    }

    /**
     * Sets Idempotency Key.
     *
     * A unique string that identifies the `CreateGiftCard` request.
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
     * The location ID where the gift card that will be created should be registered.
     */
    public function getLocationId()
    {
        return $this->locationId;
    }

    /**
     * Sets Location Id.
     *
     * The location ID where the gift card that will be created should be registered.
     *
     * @required
     * @maps location_id
     */
    public function setLocationId($locationId)
    {
        $this->locationId = $locationId;
    }

    /**
     * Returns Gift Card.
     *
     * Represents a Square gift card.
     */
    public function getGiftCard()
    {
        return $this->giftCard;
    }

    /**
     * Sets Gift Card.
     *
     * Represents a Square gift card.
     *
     * @required
     * @maps gift_card
     */
    public function setGiftCard(GiftCard $giftCard)
    {
        $this->giftCard = $giftCard;
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
        $json['gift_card']       = $this->giftCard;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
