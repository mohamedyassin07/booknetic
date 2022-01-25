<?php



namespace Square\Models;

/**
 * Describes the type of this unit and indicates which field contains the unit information. This is an
 * ‘open’ enum.
 */
class MeasurementUnitUnitType
{
    /**
     * The unit details are contained in the custom_unit field.
     */
    const TYPE_CUSTOM = 'TYPE_CUSTOM';

    /**
     * The unit details are contained in the area_unit field.
     */
    const TYPE_AREA = 'TYPE_AREA';

    /**
     * The unit details are contained in the length_unit field.
     */
    const TYPE_LENGTH = 'TYPE_LENGTH';

    /**
     * The unit details are contained in the volume_unit field.
     */
    const TYPE_VOLUME = 'TYPE_VOLUME';

    /**
     * The unit details are contained in the weight_unit field.
     */
    const TYPE_WEIGHT = 'TYPE_WEIGHT';

    /**
     * The unit details are contained in the generic_unit field.
     */
    const TYPE_GENERIC = 'TYPE_GENERIC';
}
