<?php



namespace Square\Models;

/**
 * Enumerates the `Shift` fields to sort on.
 */
class ShiftSortField
{
    /**
     * The start date/time of a `Shift`
     */
    const START_AT = 'START_AT';

    /**
     * The end date/time of a `Shift`
     */
    const END_AT = 'END_AT';

    /**
     * The date/time that a `Shift` is created
     */
    const CREATED_AT = 'CREATED_AT';

    /**
     * The most recent date/time that a `Shift` is updated
     */
    const UPDATED_AT = 'UPDATED_AT';
}
