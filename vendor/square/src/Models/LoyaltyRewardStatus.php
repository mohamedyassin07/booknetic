<?php



namespace Square\Models;

/**
 * The status of the loyalty reward.
 */
class LoyaltyRewardStatus
{
    /**
     * The reward is issued.
     */
    const ISSUED = 'ISSUED';

    /**
     * The reward is redeemed.
     */
    const REDEEMED = 'REDEEMED';

    /**
     * The reward is deleted.
     */
    const DELETED = 'DELETED';
}
