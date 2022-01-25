<?php



namespace Square\Models;

/**
 * Represents the naming used for loyalty points.
 */
class LoyaltyProgramTerminology implements \JsonSerializable
{
    /**
     * @var string
     */
    private $one;

    /**
     * @var string
     */
    private $other;

    /**
     * @param $one
     * @param $other
     */
    public function __construct($one, $other)
    {
        $this->one = $one;
        $this->other = $other;
    }

    /**
     * Returns One.
     *
     * A singular unit for a point (for example, 1 point is called 1 star).
     */
    public function getOne()
    {
        return $this->one;
    }

    /**
     * Sets One.
     *
     * A singular unit for a point (for example, 1 point is called 1 star).
     *
     * @required
     * @maps one
     */
    public function setOne($one)
    {
        $this->one = $one;
    }

    /**
     * Returns Other.
     *
     * A plural unit for point (for example, 10 points is called 10 stars).
     */
    public function getOther()
    {
        return $this->other;
    }

    /**
     * Sets Other.
     *
     * A plural unit for point (for example, 10 points is called 10 stars).
     *
     * @required
     * @maps other
     */
    public function setOther($other)
    {
        $this->other = $other;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['one']   = $this->one;
        $json['other'] = $this->other;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
