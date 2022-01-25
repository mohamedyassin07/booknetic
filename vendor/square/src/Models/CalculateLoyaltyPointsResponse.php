<?php



namespace Square\Models;

/**
 * A response that includes the points that the buyer can earn from
 * a specified purchase.
 */
class CalculateLoyaltyPointsResponse implements \JsonSerializable
{
    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * @var int|null
     */
    private $points;

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
     * Returns Points.
     *
     * The points that the buyer can earn from a specified purchase.
     */
    public function getPoints()
    {
        return $this->points;
    }

    /**
     * Sets Points.
     *
     * The points that the buyer can earn from a specified purchase.
     *
     * @maps points
     */
    public function setPoints($points = null)
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
        if (isset($this->errors)) {
            $json['errors'] = $this->errors;
        }
        if (isset($this->points)) {
            $json['points'] = $this->points;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
