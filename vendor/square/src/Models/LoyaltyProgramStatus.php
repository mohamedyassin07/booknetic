<?php



namespace Square\Models;

/**
 * Indicates whether the program is currently active.
 */
class LoyaltyProgramStatus
{
    /**
     * The loyalty program does not have an active subscription.
     * Loyalty API requests fail.
     */
    const INACTIVE = 'INACTIVE';

    /**
     * The program is fully functional. The program has an active subscription.
     */
    const ACTIVE = 'ACTIVE';
}
