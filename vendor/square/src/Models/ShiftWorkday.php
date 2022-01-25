<?php



namespace Square\Models;

/**
 * A `Shift` search query filter parameter that sets a range of days that
 * a `Shift` must start or end in before passing the filter condition.
 */
class ShiftWorkday implements \JsonSerializable
{
    /**
     * @var DateRange|null
     */
    private $dateRange;

    /**
     * @var string|null
     */
    private $matchShiftsBy;

    /**
     * @var string|null
     */
    private $defaultTimezone;

    /**
     * Returns Date Range.
     *
     * A range defined by two dates. Used for filtering a query for Connect v2
     * objects that have date properties.
     */
    public function getDateRange()
    {
        return $this->dateRange;
    }

    /**
     * Sets Date Range.
     *
     * A range defined by two dates. Used for filtering a query for Connect v2
     * objects that have date properties.
     *
     * @maps date_range
     */
    public function setDateRange(DateRange $dateRange = null)
    {
        $this->dateRange = $dateRange;
    }

    /**
     * Returns Match Shifts By.
     *
     * Defines the logic used to apply a workday filter.
     */
    public function getMatchShiftsBy()
    {
        return $this->matchShiftsBy;
    }

    /**
     * Sets Match Shifts By.
     *
     * Defines the logic used to apply a workday filter.
     *
     * @maps match_shifts_by
     */
    public function setMatchShiftsBy($matchShiftsBy = null)
    {
        $this->matchShiftsBy = $matchShiftsBy;
    }

    /**
     * Returns Default Timezone.
     *
     * Location-specific timezones convert workdays to datetime filters.
     * Every location included in the query must have a timezone, or this field
     * must be provided as a fallback. Format: the IANA timezone database
     * identifier for the relevant timezone.
     */
    public function getDefaultTimezone()
    {
        return $this->defaultTimezone;
    }

    /**
     * Sets Default Timezone.
     *
     * Location-specific timezones convert workdays to datetime filters.
     * Every location included in the query must have a timezone, or this field
     * must be provided as a fallback. Format: the IANA timezone database
     * identifier for the relevant timezone.
     *
     * @maps default_timezone
     */
    public function setDefaultTimezone($defaultTimezone = null)
    {
        $this->defaultTimezone = $defaultTimezone;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->dateRange)) {
            $json['date_range']       = $this->dateRange;
        }
        if (isset($this->matchShiftsBy)) {
            $json['match_shifts_by']  = $this->matchShiftsBy;
        }
        if (isset($this->defaultTimezone)) {
            $json['default_timezone'] = $this->defaultTimezone;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
