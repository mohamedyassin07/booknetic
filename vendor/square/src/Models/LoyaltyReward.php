<?php



namespace Square\Models;

/**
 * Represents a contract to redeem loyalty points for a [reward tier]($m/LoyaltyProgramRewardTier)
 * discount. Loyalty rewards can be in an ISSUED, REDEEMED, or DELETED state. For more information, see
 * [Redeem loyalty rewards](https://developer.squareup.com/docs/loyalty-api/overview#redeem-loyalty-
 * rewards).
 */
class LoyaltyReward implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $id;

    /**
     * @var string|null
     */
    private $status;

    /**
     * @var string
     */
    private $loyaltyAccountId;

    /**
     * @var string
     */
    private $rewardTierId;

    /**
     * @var int|null
     */
    private $points;

    /**
     * @var string|null
     */
    private $orderId;

    /**
     * @var string|null
     */
    private $createdAt;

    /**
     * @var string|null
     */
    private $updatedAt;

    /**
     * @var string|null
     */
    private $redeemedAt;

    /**
     * @param $loyaltyAccountId
     * @param $rewardTierId
     */
    public function __construct($loyaltyAccountId, $rewardTierId)
    {
        $this->loyaltyAccountId = $loyaltyAccountId;
        $this->rewardTierId = $rewardTierId;
    }

    /**
     * Returns Id.
     *
     * The Square-assigned ID of the loyalty reward.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * The Square-assigned ID of the loyalty reward.
     *
     * @maps id
     */
    public function setId($id = null)
    {
        $this->id = $id;
    }

    /**
     * Returns Status.
     *
     * The status of the loyalty reward.
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets Status.
     *
     * The status of the loyalty reward.
     *
     * @maps status
     */
    public function setStatus($status = null)
    {
        $this->status = $status;
    }

    /**
     * Returns Loyalty Account Id.
     *
     * The Square-assigned ID of the [loyalty account]($m/LoyaltyAccount) to which the reward belongs.
     */
    public function getLoyaltyAccountId()
    {
        return $this->loyaltyAccountId;
    }

    /**
     * Sets Loyalty Account Id.
     *
     * The Square-assigned ID of the [loyalty account]($m/LoyaltyAccount) to which the reward belongs.
     *
     * @required
     * @maps loyalty_account_id
     */
    public function setLoyaltyAccountId($loyaltyAccountId)
    {
        $this->loyaltyAccountId = $loyaltyAccountId;
    }

    /**
     * Returns Reward Tier Id.
     *
     * The Square-assigned ID of the [reward tier]($m/LoyaltyProgramRewardTier) used to create the reward.
     */
    public function getRewardTierId()
    {
        return $this->rewardTierId;
    }

    /**
     * Sets Reward Tier Id.
     *
     * The Square-assigned ID of the [reward tier]($m/LoyaltyProgramRewardTier) used to create the reward.
     *
     * @required
     * @maps reward_tier_id
     */
    public function setRewardTierId($rewardTierId)
    {
        $this->rewardTierId = $rewardTierId;
    }

    /**
     * Returns Points.
     *
     * The number of loyalty points used for the reward.
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * Sets Points.
     *
     * The number of loyalty points used for the reward.
     *
     * @maps points
     */
    public function setPoints($points = null)
    {
        $this->points = $points;
    }

    /**
     * Returns Order Id.
     *
     * The Square-assigned ID of the [order]($m/Order) to which the reward is attached.
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * Sets Order Id.
     *
     * The Square-assigned ID of the [order]($m/Order) to which the reward is attached.
     *
     * @maps order_id
     */
    public function setOrderId($orderId = null)
    {
        $this->orderId = $orderId;
    }

    /**
     * Returns Created At.
     *
     * The timestamp when the reward was created, in RFC 3339 format.
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Sets Created At.
     *
     * The timestamp when the reward was created, in RFC 3339 format.
     *
     * @maps created_at
     */
    public function setCreatedAt($createdAt = null)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Returns Updated At.
     *
     * The timestamp when the reward was last updated, in RFC 3339 format.
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Sets Updated At.
     *
     * The timestamp when the reward was last updated, in RFC 3339 format.
     *
     * @maps updated_at
     */
    public function setUpdatedAt($updatedAt = null)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * Returns Redeemed At.
     *
     * The timestamp when the reward was redeemed, in RFC 3339 format.
     */
    public function getRedeemedAt()
    {
        return $this->redeemedAt;
    }

    /**
     * Sets Redeemed At.
     *
     * The timestamp when the reward was redeemed, in RFC 3339 format.
     *
     * @maps redeemed_at
     */
    public function setRedeemedAt($redeemedAt = null)
    {
        $this->redeemedAt = $redeemedAt;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->id)) {
            $json['id']             = $this->id;
        }
        if (isset($this->status)) {
            $json['status']         = $this->status;
        }
        $json['loyalty_account_id'] = $this->loyaltyAccountId;
        $json['reward_tier_id']     = $this->rewardTierId;
        if (isset($this->points)) {
            $json['points']         = $this->points;
        }
        if (isset($this->orderId)) {
            $json['order_id']       = $this->orderId;
        }
        if (isset($this->createdAt)) {
            $json['created_at']     = $this->createdAt;
        }
        if (isset($this->updatedAt)) {
            $json['updated_at']     = $this->updatedAt;
        }
        if (isset($this->redeemedAt)) {
            $json['redeemed_at']    = $this->redeemedAt;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
