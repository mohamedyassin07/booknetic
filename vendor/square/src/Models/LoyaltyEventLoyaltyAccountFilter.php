<?php



namespace Square\Models;

/**
 * Filter events by loyalty account.
 */
class LoyaltyEventLoyaltyAccountFilter implements \JsonSerializable
{
    /**
     * @var string
     */
    private $loyaltyAccountId;

    /**
     * @param $loyaltyAccountId
     */
    public function __construct($loyaltyAccountId)
    {
        $this->loyaltyAccountId = $loyaltyAccountId;
    }

    /**
     * Returns Loyalty Account Id.
     *
     * The ID of the [loyalty account]($m/LoyaltyAccount) associated with loyalty events.
     */
    public function getLoyaltyAccountId()
    {
        return $this->loyaltyAccountId;
    }

    /**
     * Sets Loyalty Account Id.
     *
     * The ID of the [loyalty account]($m/LoyaltyAccount) associated with loyalty events.
     *
     * @required
     * @maps loyalty_account_id
     */
    public function setLoyaltyAccountId($loyaltyAccountId)
    {
        $this->loyaltyAccountId = $loyaltyAccountId;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['loyalty_account_id'] = $this->loyaltyAccountId;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
