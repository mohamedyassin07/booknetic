<?php



namespace Square\Models;

/**
 * Represents the hours of operation for a business location.
 */
class BusinessHours implements \JsonSerializable
{
    /**
     * @var BusinessHoursPeriod[]|null
     */
    private $periods;

    /**
     * Returns Periods.
     *
     * The list of time periods during which the business is open. There may be at most 10
     * periods per day.
     *
     * @return BusinessHoursPeriod[]|null
     */
    public function getPeriods()
    {
        return $this->periods;
    }

    /**
     * Sets Periods.
     *
     * The list of time periods during which the business is open. There may be at most 10
     * periods per day.
     *
     * @maps periods
     *
     * @param BusinessHoursPeriod[]|null $periods
     */
    public function setPeriods(array $periods = null)
    {
        $this->periods = $periods;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->periods)) {
            $json['periods'] = $this->periods;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
