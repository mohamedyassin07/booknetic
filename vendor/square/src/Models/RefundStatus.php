<?php



namespace Square\Models;

/**
 * Indicates a refund's current status.
 */
class RefundStatus
{
    /**
     * The refund is pending.
     */
    const PENDING = 'PENDING';

    /**
     * The refund has been approved by Square.
     */
    const APPROVED = 'APPROVED';

    /**
     * The refund has been rejected by Square.
     */
    const REJECTED = 'REJECTED';

    /**
     * The refund failed.
     */
    const FAILED = 'FAILED';
}
