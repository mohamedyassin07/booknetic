<?php



namespace Square\Models;

/**
 * Specifies the `status` of `Shift` records to be returned.
 */
class ShiftFilterStatus
{
    /**
     * Shifts that have been started and not ended.
     */
    const OPEN = 'OPEN';

    /**
     * Shifts that have been started and ended.
     */
    const CLOSED = 'CLOSED';
}
