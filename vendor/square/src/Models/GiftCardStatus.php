<?php



namespace Square\Models;

/**
 * Indicates the gift card state.
 */
class GiftCardStatus
{
    /**
     * The gift card is active and can be used as a payment source.
     */
    const ACTIVE = 'ACTIVE';

    /**
     * Any activity that changes the gift card balance is permanently forbidden.
     */
    const DEACTIVATED = 'DEACTIVATED';

    /**
     * Any activity that changes the gift card balance is temporarily forbidden.
     */
    const BLOCKED = 'BLOCKED';

    /**
     * The gift card is pending activation.
     * This is the state when a gift card is initially created. You must activate the gift card
     * before you can use it.
     */
    const PENDING = 'PENDING';
}
