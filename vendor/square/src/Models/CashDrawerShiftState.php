<?php



namespace Square\Models;

/**
 * The current state of a cash drawer shift.
 */
class CashDrawerShiftState
{
    /**
     * An open cash drawer shift.
     */
    const OPEN = 'OPEN';

    /**
     * A cash drawer shift that is ended but has not yet had an employee content audit.
     */
    const ENDED = 'ENDED';

    /**
     * An ended cash drawer shift that is closed with a completed employee
     * content audit and recorded result.
     */
    const CLOSED = 'CLOSED';
}
