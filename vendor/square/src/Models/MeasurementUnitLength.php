<?php



namespace Square\Models;

/**
 * The unit of length used to measure a quantity.
 */
class MeasurementUnitLength
{
    /**
     * The length is measured in inches.
     */
    const IMPERIAL_INCH = 'IMPERIAL_INCH';

    /**
     * The length is measured in feet.
     */
    const IMPERIAL_FOOT = 'IMPERIAL_FOOT';

    /**
     * The length is measured in yards.
     */
    const IMPERIAL_YARD = 'IMPERIAL_YARD';

    /**
     * The length is measured in miles.
     */
    const IMPERIAL_MILE = 'IMPERIAL_MILE';

    /**
     * The length is measured in millimeters.
     */
    const METRIC_MILLIMETER = 'METRIC_MILLIMETER';

    /**
     * The length is measured in centimeters.
     */
    const METRIC_CENTIMETER = 'METRIC_CENTIMETER';

    /**
     * The length is measured in meters.
     */
    const METRIC_METER = 'METRIC_METER';

    /**
     * The length is measured in kilometers.
     */
    const METRIC_KILOMETER = 'METRIC_KILOMETER';
}
