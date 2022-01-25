<?php



namespace Square\Models;

/**
 * Provides metadata when the event `type` is `ADJUST_POINTS`.
 */
class LoyaltyEventAdjustPoints implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $loyaltyProgramId;

    /**
     * @var int
     */
    private $points;

    /**
     * @var string|null
     */
    private $reason;

    /**
     * @param $points
     */
    public function __construct($points)
    {
        $this->points = $points;
    }

    /**
     * Returns Loyalty Program Id.
     *
     * The Square-assigned ID of the [loyalty program]($m/LoyaltyProgram).
     */
    public function getLoyaltyProgramId()
    {
        return $this->loyaltyProgramId;
    }

    /**
     * Sets Loyalty Program Id.
     *
     * The Square-assigned ID of the [loyalty program]($m/LoyaltyProgram).
     *
     * @maps loyalty_program_id
     */
    public function setLoyaltyProgramId($loyaltyProgramId = null)
    {
        $this->loyaltyProgramId = $loyaltyProgramId;
    }

    /**
     * Returns Points.
     *
     * The number of points added or removed.
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * Sets Points.
     *
     * The number of points added or removed.
     *
     * @required
     * @maps points
     */
    public function setPoints($points)
    {
        $this->points = $points;
    }

    /**
     * Returns Reason.
     *
     * The reason for the adjustment of points.
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * Sets Reason.
     *
     * The reason for the adjustment of points.
     *
     * @maps reason
     */
    public function setReason($reason = null)
    {
        $this->reason = $reason;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->loyaltyProgramId)) {
            $json['loyalty_program_id'] = $this->loyaltyProgramId;
        }
        $json['points']                 = $this->points;
        if (isset($this->reason)) {
            $json['reason']             = $this->reason;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
