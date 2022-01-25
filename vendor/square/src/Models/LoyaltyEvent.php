<?php



namespace Square\Models;

/**
 * Provides information about a loyalty event.
 * For more information, see [Loyalty events](https://developer.squareup.com/docs/loyalty-
 * api/overview/#loyalty-events).
 */
class LoyaltyEvent implements \JsonSerializable
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $createdAt;

    /**
     * @var LoyaltyEventAccumulatePoints|null
     */
    private $accumulatePoints;

    /**
     * @var LoyaltyEventCreateReward|null
     */
    private $createReward;

    /**
     * @var LoyaltyEventRedeemReward|null
     */
    private $redeemReward;

    /**
     * @var LoyaltyEventDeleteReward|null
     */
    private $deleteReward;

    /**
     * @var LoyaltyEventAdjustPoints|null
     */
    private $adjustPoints;

    /**
     * @var string
     */
    private $loyaltyAccountId;

    /**
     * @var string|null
     */
    private $locationId;

    /**
     * @var string
     */
    private $source;

    /**
     * @var LoyaltyEventExpirePoints|null
     */
    private $expirePoints;

    /**
     * @var LoyaltyEventOther|null
     */
    private $otherEvent;

    /**
     * @param $id
     * @param $type
     * @param $createdAt
     * @param $loyaltyAccountId
     * @param $source
     */
    public function __construct($id, $type, $createdAt, $loyaltyAccountId, $source)
    {
        $this->id = $id;
        $this->type = $type;
        $this->createdAt = $createdAt;
        $this->loyaltyAccountId = $loyaltyAccountId;
        $this->source = $source;
    }

    /**
     * Returns Id.
     *
     * The Square-assigned ID of the loyalty event.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * The Square-assigned ID of the loyalty event.
     *
     * @required
     * @maps id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Returns Type.
     *
     * The type of the loyalty event.
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Sets Type.
     *
     * The type of the loyalty event.
     *
     * @required
     * @maps type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * Returns Created At.
     *
     * The timestamp when the event was created, in RFC 3339 format.
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Sets Created At.
     *
     * The timestamp when the event was created, in RFC 3339 format.
     *
     * @required
     * @maps created_at
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
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
     * @maps accumulate_points
     */
    public function setAccumulatePoints(LoyaltyEventAccumulatePoints $accumulatePoints = null)
    {
        $this->accumulatePoints = $accumulatePoints;
    }

    /**
     * Returns Create Reward.
     *
     * Provides metadata when the event `type` is `CREATE_REWARD`.
     */
    public function getCreateReward()
    {
        return $this->createReward;
    }

    /**
     * Sets Create Reward.
     *
     * Provides metadata when the event `type` is `CREATE_REWARD`.
     *
     * @maps create_reward
     */
    public function setCreateReward(LoyaltyEventCreateReward $createReward = null)
    {
        $this->createReward = $createReward;
    }

    /**
     * Returns Redeem Reward.
     *
     * Provides metadata when the event `type` is `REDEEM_REWARD`.
     */
    public function getRedeemReward()
    {
        return $this->redeemReward;
    }

    /**
     * Sets Redeem Reward.
     *
     * Provides metadata when the event `type` is `REDEEM_REWARD`.
     *
     * @maps redeem_reward
     */
    public function setRedeemReward(LoyaltyEventRedeemReward $redeemReward = null)
    {
        $this->redeemReward = $redeemReward;
    }

    /**
     * Returns Delete Reward.
     *
     * Provides metadata when the event `type` is `DELETE_REWARD`.
     */
    public function getDeleteReward()
    {
        return $this->deleteReward;
    }

    /**
     * Sets Delete Reward.
     *
     * Provides metadata when the event `type` is `DELETE_REWARD`.
     *
     * @maps delete_reward
     */
    public function setDeleteReward(LoyaltyEventDeleteReward $deleteReward = null)
    {
        $this->deleteReward = $deleteReward;
    }

    /**
     * Returns Adjust Points.
     *
     * Provides metadata when the event `type` is `ADJUST_POINTS`.
     */
    public function getAdjustPoints()
    {
        return $this->adjustPoints;
    }

    /**
     * Sets Adjust Points.
     *
     * Provides metadata when the event `type` is `ADJUST_POINTS`.
     *
     * @maps adjust_points
     */
    public function setAdjustPoints(LoyaltyEventAdjustPoints $adjustPoints = null)
    {
        $this->adjustPoints = $adjustPoints;
    }

    /**
     * Returns Loyalty Account Id.
     *
     * The ID of the [loyalty account]($m/LoyaltyAccount) in which the event occurred.
     */
    public function getLoyaltyAccountId()
    {
        return $this->loyaltyAccountId;
    }

    /**
     * Sets Loyalty Account Id.
     *
     * The ID of the [loyalty account]($m/LoyaltyAccount) in which the event occurred.
     *
     * @required
     * @maps loyalty_account_id
     */
    public function setLoyaltyAccountId($loyaltyAccountId)
    {
        $this->loyaltyAccountId = $loyaltyAccountId;
    }

    /**
     * Returns Location Id.
     *
     * The ID of the [location]($m/Location) where the event occurred.
     */
    public function getLocationId()
    {
        return $this->locationId;
    }

    /**
     * Sets Location Id.
     *
     * The ID of the [location]($m/Location) where the event occurred.
     *
     * @maps location_id
     */
    public function setLocationId($locationId = null)
    {
        $this->locationId = $locationId;
    }

    /**
     * Returns Source.
     *
     * Defines whether the event was generated by the Square Point of Sale.
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Sets Source.
     *
     * Defines whether the event was generated by the Square Point of Sale.
     *
     * @required
     * @maps source
     */
    public function setSource($source)
    {
        $this->source = $source;
    }

    /**
     * Returns Expire Points.
     *
     * Provides metadata when the event `type` is `EXPIRE_POINTS`.
     */
    public function getExpirePoints()
    {
        return $this->expirePoints;
    }

    /**
     * Sets Expire Points.
     *
     * Provides metadata when the event `type` is `EXPIRE_POINTS`.
     *
     * @maps expire_points
     */
    public function setExpirePoints(LoyaltyEventExpirePoints $expirePoints = null)
    {
        $this->expirePoints = $expirePoints;
    }

    /**
     * Returns Other Event.
     *
     * Provides metadata when the event `type` is `OTHER`.
     */
    public function getOtherEvent()
    {
        return $this->otherEvent;
    }

    /**
     * Sets Other Event.
     *
     * Provides metadata when the event `type` is `OTHER`.
     *
     * @maps other_event
     */
    public function setOtherEvent(LoyaltyEventOther $otherEvent = null)
    {
        $this->otherEvent = $otherEvent;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['id']                    = $this->id;
        $json['type']                  = $this->type;
        $json['created_at']            = $this->createdAt;
        if (isset($this->accumulatePoints)) {
            $json['accumulate_points'] = $this->accumulatePoints;
        }
        if (isset($this->createReward)) {
            $json['create_reward']     = $this->createReward;
        }
        if (isset($this->redeemReward)) {
            $json['redeem_reward']     = $this->redeemReward;
        }
        if (isset($this->deleteReward)) {
            $json['delete_reward']     = $this->deleteReward;
        }
        if (isset($this->adjustPoints)) {
            $json['adjust_points']     = $this->adjustPoints;
        }
        $json['loyalty_account_id']    = $this->loyaltyAccountId;
        if (isset($this->locationId)) {
            $json['location_id']       = $this->locationId;
        }
        $json['source']                = $this->source;
        if (isset($this->expirePoints)) {
            $json['expire_points']     = $this->expirePoints;
        }
        if (isset($this->otherEvent)) {
            $json['other_event']       = $this->otherEvent;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
