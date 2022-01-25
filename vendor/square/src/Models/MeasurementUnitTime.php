<?php



namespace Square\Models;

/**
 * Unit of time used to measure a quantity (a duration).
 */
class MeasurementUnitTime
{
    /**
     * The time is measured in milliseconds.
     */
    const GENERIC_MILLISECOND = 'GENERIC_MILLISECOND';

    /**
     * The time is measured in seconds.
     */
    const GENERIC_SECOND = 'GENERIC_SECOND';

    /**
     * The time is measured in minutes.
     */
    const GENERIC_MINUTE = 'GENERIC_MINUTE';

    /**
     * The time is measured in hours.
     */
    const GENERIC_HOUR = 'GENERIC_HOUR';

    /**
     * The time is measured in days.
     */
    const GENERIC_DAY = 'GENERIC_DAY';
}
