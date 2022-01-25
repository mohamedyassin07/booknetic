<?php



namespace Square\Models;

/**
 * The range of a number value between the specified lower and upper bounds.
 */
class Range implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $min;

    /**
     * @var string|null
     */
    private $max;

    /**
     * Returns Min.
     *
     * The lower bound of the number range.
     */
    public function getMin()
    {
        return $this->min;
    }

    /**
     * Sets Min.
     *
     * The lower bound of the number range.
     *
     * @maps min
     */
    public function setMin($min = null)
    {
        $this->min = $min;
    }

    /**
     * Returns Max.
     *
     * The upper bound of the number range.
     */
    public function getMax()
    {
        return $this->max;
    }

    /**
     * Sets Max.
     *
     * The upper bound of the number range.
     *
     * @maps max
     */
    public function setMax($max = null)
    {
        $this->max = $max;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->min)) {
            $json['min'] = $this->min;
        }
        if (isset($this->max)) {
            $json['max'] = $this->max;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
