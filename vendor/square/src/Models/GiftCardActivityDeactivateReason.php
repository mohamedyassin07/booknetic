<?php



namespace Square\Models;

class GiftCardActivityDeactivateReason
{
    /**
     * The seller suspects suspicious activity.
     */
    const SUSPICIOUS_ACTIVITY = 'SUSPICIOUS_ACTIVITY';

    /**
     * The gift card deactivated for an unknown reason.
     */
    const UNKNOWN_REASON = 'UNKNOWN_REASON';

    /**
     * A chargeback on the gift card purchase (or the gift card load) was ruled in favor of the buyer.
     */
    const CHARGEBACK_DEACTIVATE = 'CHARGEBACK_DEACTIVATE';
}
