<?php



namespace Square\Models;

/**
 * A response that includes the loyalty reward.
 */
class RetrieveLoyaltyRewardResponse implements \JsonSerializable
{
    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * @var LoyaltyReward|null
     */
    private $reward;

    /**
     * Returns Errors.
     *
     * Any errors that occurred during the request.
     *
     * @return Error[]|null
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * Sets Errors.
     *
     * Any errors that occurred during the request.
     *
     * @maps errors
     *
     * @param Error[]|null $errors
     */
    public function setErrors(array $errors = null)
    {
        $this->errors = $errors;
    }

    /**
     * Returns Reward.
     *
     * Represents a contract to redeem loyalty points for a [reward tier]($m/LoyaltyProgramRewardTier)
     * discount. Loyalty rewards can be in an ISSUED, REDEEMED, or DELETED state. For more information, see
     * [Redeem loyalty rewards](https://developer.squareup.com/docs/loyalty-api/overview#redeem-loyalty-
     * rewards).
     */
    public function getReward()
    {
        return $this->reward;
    }

    /**
     * Sets Reward.
     *
     * Represents a contract to redeem loyalty points for a [reward tier]($m/LoyaltyProgramRewardTier)
     * discount. Loyalty rewards can be in an ISSUED, REDEEMED, or DELETED state. For more information, see
     * [Redeem loyalty rewards](https://developer.squareup.com/docs/loyalty-api/overview#redeem-loyalty-
     * rewards).
     *
     * @maps reward
     */
    public function setReward(LoyaltyReward $reward = null)
    {
        $this->reward = $reward;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->errors)) {
            $json['errors'] = $this->errors;
        }
        if (isset($this->reward)) {
            $json['reward'] = $this->reward;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
