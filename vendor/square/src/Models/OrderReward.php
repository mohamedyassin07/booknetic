<?php



namespace Square\Models;

/**
 * Represents a reward that can be applied to an order if the necessary
 * reward tier criteria are met. Rewards are created through the Loyalty API.
 */
class OrderReward implements \JsonSerializable
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $rewardTierId;

    /**
     * @param $id
     * @param $rewardTierId
     */
    public function __construct($id, $rewardTierId)
    {
        $this->id = $id;
        $this->rewardTierId = $rewardTierId;
    }

    /**
     * Returns Id.
     *
     * The identifier of the reward.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * The identifier of the reward.
     *
     * @required
     * @maps id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Returns Reward Tier Id.
     *
     * The identifier of the reward tier corresponding to this reward.
     */
    public function getRewardTierId()
    {
        return $this->rewardTierId;
    }

    /**
     * Sets Reward Tier Id.
     *
     * The identifier of the reward tier corresponding to this reward.
     *
     * @required
     * @maps reward_tier_id
     */
    public function setRewardTierId($rewardTierId)
    {
        $this->rewardTierId = $rewardTierId;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['id']             = $this->id;
        $json['reward_tier_id'] = $this->rewardTierId;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
