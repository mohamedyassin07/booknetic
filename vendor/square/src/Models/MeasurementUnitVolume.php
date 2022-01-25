<?php



namespace Square\Models;

/**
 * The unit of volume used to measure a quantity.
 */
class MeasurementUnitVolume
{
    /**
     * The volume is measured in ounces.
     */
    const GENERIC_FLUID_OUNCE = 'GENERIC_FLUID_OUNCE';

    /**
     * The volume is measured in shots.
     */
    const GENERIC_SHOT = 'GENERIC_SHOT';

    /**
     * The volume is measured in cups.
     */
    const GENERIC_CUP = 'GENERIC_CUP';

    /**
     * The volume is measured in pints.
     */
    const GENERIC_PINT = 'GENERIC_PINT';

    /**
     * The volume is measured in quarts.
     */
    const GENERIC_QUART = 'GENERIC_QUART';

    /**
     * The volume is measured in gallons.
     */
    const GENERIC_GALLON = 'GENERIC_GALLON';

    /**
     * The volume is measured in cubic inches.
     */
    const IMPERIAL_CUBIC_INCH = 'IMPERIAL_CUBIC_INCH';

    /**
     * The volume is measured in cubic feet.
     */
    const IMPERIAL_CUBIC_FOOT = 'IMPERIAL_CUBIC_FOOT';

    /**
     * The volume is measured in cubic yards.
     */
    const IMPERIAL_CUBIC_YARD = 'IMPERIAL_CUBIC_YARD';

    /**
     * The volume is measured in metric milliliters.
     */
    const METRIC_MILLILITER = 'METRIC_MILLILITER';

    /**
     * The volume is measured in metric liters.
     */
    const METRIC_LITER = 'METRIC_LITER';
}
