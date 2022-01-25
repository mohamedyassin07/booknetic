<?php



namespace Square\Models;

/**
 * A request to create a new loyalty account.
 */
class CreateLoyaltyAccountRequest implements \JsonSerializable
{
    /**
     * @var LoyaltyAccount
     */
    private $loyaltyAccount;

    /**
     * @var string
     */
    private $idempotencyKey;

    /**
     * @param LoyaltyAccount $loyaltyAccount
     * @param $idempotencyKey
     */
    public function __construct(LoyaltyAccount $loyaltyAccount, $idempotencyKey)
    {
        $this->loyaltyAccount = $loyaltyAccount;
        $this->idempotencyKey = $idempotencyKey;
    }

    /**
     * Returns Loyalty Account.
     *
     * Describes a loyalty account. For more information, see
     * [Manage Loyalty Accounts Using the Loyalty API](https://developer.squareup.com/docs/loyalty-
     * api/overview).
     */
    public function getLoyaltyAccount()
    {
        return $this->loyaltyAccount;
    }

    /**
     * Sets Loyalty Account.
     *
     * Describes a loyalty account. For more information, see
     * [Manage Loyalty Accounts Using the Loyalty API](https://developer.squareup.com/docs/loyalty-
     * api/overview).
     *
     * @required
     * @maps loyalty_account
     */
    public function setLoyaltyAccount(LoyaltyAccount $loyaltyAccount)
    {
        $this->loyaltyAccount = $loyaltyAccount;
    }

    /**
     * Returns Idempotency Key.
     *
     * A unique string that identifies this `CreateLoyaltyAccount` request.
     * Keys can be any valid string, but must be unique for every request.
     */
    public function getIdempotencyKey()
    {
        return $this->idempotencyKey;
    }

    /**
     * Sets Idempotency Key.
     *
     * A unique string that identifies this `CreateLoyaltyAccount` request.
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
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['loyalty_account'] = $this->loyaltyAccount;
        $json['idempotency_key'] = $this->idempotencyKey;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
