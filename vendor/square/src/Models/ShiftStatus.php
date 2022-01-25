<?php



namespace Square\Models;

/**
 * Enumerates the possible status of a `Shift`
 */
class ShiftStatus
{
    /**
     * Employee started a work shift and the shift is not complete
     */
    const OPEN = 'OPEN';

    /**
     * Employee started and ended a work shift.
     */
    const CLOSED = 'CLOSED';
}
