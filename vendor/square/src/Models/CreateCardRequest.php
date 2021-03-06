<?php



namespace Square\Models;

/**
 * Creates a card from the source (nonce, payment id, etc). Accessible via
 * HTTP requests at POST https://connect.squareup.com/v2/cards
 */
class CreateCardRequest implements \JsonSerializable
{
    /**
     * @var string
     */
    private $idempotencyKey;

    /**
     * @var string
     */
    private $sourceId;

    /**
     * @var string|null
     */
    private $verificationToken;

    /**
     * @var Card
     */
    private $card;

    /**
     * @param $idempotencyKey
     * @param $sourceId
     * @param Card $card
     */
    public function __construct($idempotencyKey, $sourceId, Card $card)
    {
        $this->idempotencyKey = $idempotencyKey;
        $this->sourceId = $sourceId;
        $this->card = $card;
    }

    /**
     * Returns Idempotency Key.
     *
     * A unique string that identifies this CreateCard request. Keys can be
     * any valid string and must be unique for every request.
     *
     * Max: 45 characters
     *
     * See [Idempotency keys](https://developer.squareup.com/docs/basics/api101/idempotency) for more
     * information.
     */
    public function getIdempotencyKey()
    {
        return $this->idempotencyKey;
    }

    /**
     * Sets Idempotency Key.
     *
     * A unique string that identifies this CreateCard request. Keys can be
     * any valid string and must be unique for every request.
     *
     * Max: 45 characters
     *
     * See [Idempotency keys](https://developer.squareup.com/docs/basics/api101/idempotency) for more
     * information.
     *
     * @required
     * @maps idempotency_key
     */
    public function setIdempotencyKey($idempotencyKey)
    {
        $this->idempotencyKey = $idempotencyKey;
    }

    /**
     * Returns Source Id.
     *
     * The ID of the source which represents the card information to be stored. This can be a card nonce or
     * a payment id.
     */
    public function getSourceId()
    {
        return $this->sourceId;
    }

    /**
     * Sets Source Id.
     *
     * The ID of the source which represents the card information to be stored. This can be a card nonce or
     * a payment id.
     *
     * @required
     * @maps source_id
     */
    public function setSourceId($sourceId)
    {
        $this->sourceId = $sourceId;
    }

    /**
     * Returns Verification Token.
     *
     * An identifying token generated by [Payments.verifyBuyer()](https://developer.squareup.
     * com/reference/sdks/web/payments/objects/Payments#Payments.verifyBuyer).
     * Verification tokens encapsulate customer device information and 3-D Secure
     * challenge results to indicate that Square has verified the buyer identity.
     *
     * See the [SCA Overview](https://developer.squareup.com/docs/sca-overview).
     */
    public function getVerificationToken()
    {
        return $this->verificationToken;
    }

    /**
     * Sets Verification Token.
     *
     * An identifying token generated by [Payments.verifyBuyer()](https://developer.squareup.
     * com/reference/sdks/web/payments/objects/Payments#Payments.verifyBuyer).
     * Verification tokens encapsulate customer device information and 3-D Secure
     * challenge results to indicate that Square has verified the buyer identity.
     *
     * See the [SCA Overview](https://developer.squareup.com/docs/sca-overview).
     *
     * @maps verification_token
     */
    public function setVerificationToken($verificationToken = null)
    {
        $this->verificationToken = $verificationToken;
    }

    /**
     * Returns Card.
     *
     * Represents the payment details of a card to be used for payments. These
     * details are determined by the payment token generated by Web Payments SDK.
     */
    public function getCard()
    {
        return $this->card;
    }

    /**
     * Sets Card.
     *
     * Represents the payment details of a card to be used for payments. These
     * details are determined by the payment token generated by Web Payments SDK.
     *
     * @required
     * @maps card
     */
    public function setCard(Card $card)
    {
        $this->card = $card;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['idempotency_key']        = $this->idempotencyKey;
        $json['source_id']              = $this->sourceId;
        if (isset($this->verificationToken)) {
            $json['verification_token'] = $this->verificationToken;
        }
        $json['card']                   = $this->card;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
