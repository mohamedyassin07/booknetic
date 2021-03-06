<?php



namespace Square\Models;

/**
 * Provides metadata when the event `type` is `REDEEM_REWARD`.
 */
class LoyaltyEventRedeemReward implements \JsonSerializable
{
    /**
     * @var string
     */
    private $loyaltyProgramId;

    /**
     * @var string|null
     */
    private $rewardId;

    /**
     * @var string|null
     */
    private $orderId;

    /**
     * @param $loyaltyProgramId
     */
    public function __construct($loyaltyProgramId)
    {
        $this->loyaltyProgramId = $loyaltyProgramId;
    }

    /**
     * Returns Loyalty Program Id.
     *
     * The ID of the [loyalty program]($m/LoyaltyProgram).
     */
    public function getLoyaltyProgramId()
    {
        return $this->loyaltyProgramId;
    }

    /**
     * Sets Loyalty Program Id.
     *
     * The ID of the [loyalty program]($m/LoyaltyProgram).
     *
     * @required
     * @maps loyalty_program_id
     */
    public function setLoyaltyProgramId($loyaltyProgramId)
    {
        $this->loyaltyProgramId = $loyaltyProgramId;
    }

    /**
     * Returns Reward Id.
     *
     * The ID of the redeemed [loyalty reward]($m/LoyaltyReward).
     * This field is returned only if the event source is `LOYALTY_API`.
     */
    public function getRewardId()
    {
        return $this->rewardId;
    }

    /**
     * Sets Reward Id.
     *
     * The ID of the redeemed [loyalty reward]($m/LoyaltyReward).
     * This field is returned only if the event source is `LOYALTY_API`.
     *
     * @maps reward_id
     */
    public function setRewardId($rewardId = null)
    {
        $this->rewardId = $rewardId;
    }

    /**
     * Returns Order Id.
     *
     * The ID of the [order]($m/Order) that redeemed the reward.
     * This field is returned only if the Orders API is used to process orders.
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * Sets Order Id.
     *
     * The ID of the [order]($m/Order) that redeemed the reward.
     * This field is returned only if the Orders API is used to process orders.
     *
     * @maps order_id
     */
    public function setOrderId($orderId = null)
    {
        $this->orderId = $orderId;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['loyalty_program_id'] = $this->loyaltyProgramId;
        if (isset($this->rewardId)) {
            $json['reward_id']      = $this->rewardId;
        }
        if (isset($this->orderId)) {
            $json['order_id']       = $this->orderId;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
