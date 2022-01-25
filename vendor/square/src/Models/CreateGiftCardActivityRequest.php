<?php



namespace Square\Models;

/**
 * A request to create a gift card activity.
 */
class CreateGiftCardActivityRequest implements \JsonSerializable
{
    /**
     * @var string
     */
    private $idempotencyKey;

    /**
     * @var GiftCardActivity
     */
    private $giftCardActivity;

    /**
     * @param $idempotencyKey
     * @param GiftCardActivity $giftCardActivity
     */
    public function __construct($idempotencyKey, GiftCardActivity $giftCardActivity)
    {
        $this->idempotencyKey = $idempotencyKey;
        $this->giftCardActivity = $giftCardActivity;
    }

    /**
     * Returns Idempotency Key.
     *
     * A unique string that identifies the `CreateGiftCardActivity` request.
     */
    public function getIdempotencyKey()
    {
        return $this->idempotencyKey;
    }

    /**
     * Sets Idempotency Key.
     *
     * A unique string that identifies the `CreateGiftCardActivity` request.
     *
     * @required
     * @maps idempotency_key
     */
    public function setIdempotencyKey($idempotencyKey)
    {
        $this->idempotencyKey = $idempotencyKey;
    }

    /**
     * Returns Gift Card Activity.
     *
     * Represents an action performed on a gift card that affects its state or balance.
     */
    public function getGiftCardActivity()
    {
        return $this->giftCardActivity;
    }

    /**
     * Sets Gift Card Activity.
     *
     * Represents an action performed on a gift card that affects its state or balance.
     *
     * @required
     * @maps gift_card_activity
     */
    public function setGiftCardActivity(GiftCardActivity $giftCardActivity)
    {
        $this->giftCardActivity = $giftCardActivity;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['idempotency_key']    = $this->idempotencyKey;
        $json['gift_card_activity'] = $this->giftCardActivity;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
