<?php



namespace Square\Models;

/**
 * The type of the loyalty event.
 */
class LoyaltyEventType
{
    /**
     * Points are added to a loyalty account for a purchase.
     */
    const ACCUMULATE_POINTS = 'ACCUMULATE_POINTS';

    /**
     * A loyalty reward is created. For more information, see
     * [Loyalty rewards](https://developer.squareup.com/docs/loyalty-api/overview/#loyalty-overview-loyalty-
     * rewards).
     */
    const CREATE_REWARD = 'CREATE_REWARD';

    /**
     * A loyalty reward is redeemed.
     */
    const REDEEM_REWARD = 'REDEEM_REWARD';

    /**
     * A loyalty reward is deleted.
     */
    const DELETE_REWARD = 'DELETE_REWARD';

    /**
     * Loyalty points are manually adjusted.
     */
    const ADJUST_POINTS = 'ADJUST_POINTS';

    /**
     * Loyalty points are expired according to the
     * expiration policy of the loyalty program.
     */
    const EXPIRE_POINTS = 'EXPIRE_POINTS';

    /**
     * Some other loyalty event occurred.
     */
    const OTHER = 'OTHER';
}
