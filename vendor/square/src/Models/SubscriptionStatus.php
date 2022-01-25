<?php



namespace Square\Models;

/**
 * Possible subscription status values.
 */
class SubscriptionStatus
{
    /**
     * The subscription starts in the future.
     */
    const PENDING = 'PENDING';

    /**
     * The subscription is active.
     */
    const ACTIVE = 'ACTIVE';

    /**
     * The subscription is canceled.
     */
    const CANCELED = 'CANCELED';

    /**
     * The subscription is deactivated.
     */
    const DEACTIVATED = 'DEACTIVATED';
}
