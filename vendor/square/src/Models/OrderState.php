<?php



namespace Square\Models;

/**
 * The state of the order.
 */
class OrderState
{
    /**
     * Indicates that the order is open. Open orders can be updated.
     */
    const OPEN = 'OPEN';

    /**
     * Indicates that the order is completed. Completed orders are fully paid. This is a terminal state.
     */
    const COMPLETED = 'COMPLETED';

    /**
     * Indicates that the order is canceled. Canceled orders are not paid. This is a terminal state.
     */
    const CANCELED = 'CANCELED';
}
