<?php



namespace Square\Models;

class GiftCardActivityType
{
    /**
     * Activated a gift card with a balance.
     */
    const ACTIVATE = 'ACTIVATE';

    /**
     * Loaded a gift card with additional funds.
     */
    const LOAD = 'LOAD';

    /**
     * Redeemed a gift card.
     */
    const REDEEM = 'REDEEM';

    /**
     * Cleared a gift card balance to zero.
     */
    const CLEAR_BALANCE = 'CLEAR_BALANCE';

    /**
     * Permanently blocked a gift card from a balance-changing
     * activity.
     */
    const DEACTIVATE = 'DEACTIVATE';

    /**
     * Manually increased a gift card balance.
     */
    const ADJUST_INCREMENT = 'ADJUST_INCREMENT';

    /**
     * Manually decreased a gift card balance.
     */
    const ADJUST_DECREMENT = 'ADJUST_DECREMENT';

    /**
     * Added money to a gift card because a transaction
     * paid with this gift card was refunded.
     */
    const REFUND = 'REFUND';

    /**
     * Added money to a gift card because a transaction
     * not linked to this gift card was refunded
     * to this gift card.
     */
    const UNLINKED_ACTIVITY_REFUND = 'UNLINKED_ACTIVITY_REFUND';

    /**
     * Imported a third-party gift card.
     */
    const IMPORT = 'IMPORT';

    /**
     * Temporarily blocked a gift card from balance-changing
     * activities.
     */
    const BLOCK = 'BLOCK';

    /**
     * Unblocked a gift card. It can resume balance-changing activities.
     */
    const UNBLOCK = 'UNBLOCK';

    /**
     * A third-party gift card was imported with a balance.
     * The import is reversed.
     */
    const IMPORT_REVERSAL = 'IMPORT_REVERSAL';
}
