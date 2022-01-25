<?php



namespace Square\Models;

/**
 * Provides metadata when the event `type` is `DELETE_REWARD`.
 */
class LoyaltyEventDeleteReward implements \JsonSerializable
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
     * @var int
     */
    private $points;

    /**
     * @param $loyaltyProgramId
     * @param $points
     */
    public function __construct($loyaltyProgramId, $points)
    {
        $this->loyaltyProgramId = $loyaltyProgramId;
        $this->points = $points;
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
     * The ID of the deleted [loyalty reward]($m/LoyaltyReward).
     * This field is returned only if the event source is `LOYALTY_API`.
     */
    public function getRewardId()
    {
        return $this->rewardId;
    }

    /**
     * Sets Reward Id.
     *
     * The ID of the deleted [loyalty reward]($m/LoyaltyReward).
     * This field is returned only if the event source is `LOYALTY_API`.
     *
     * @maps reward_id
     */
    public function setRewardId($rewardId = null)
    {
        $this->rewardId = $rewardId;
    }

    /**
     * Returns Points.
     *
     * The number of points returned to the loyalty account.
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * Sets Points.
     *
     * The number of points returned to the loyalty account.
     *
     * @required
     * @maps points
     */
    public function setPoints($points)
    {
        $this->points = $points;
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
        $json['points']             = $this->points;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
