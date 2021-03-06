<?php



namespace Square\Models;

/**
 * Indicates the scope of the reward tier. DEPRECATED at version 2020-12-16. Discount details
 * are now defined using a catalog pricing rule and other catalog objects. For more information, see
 * [Get discount details for the reward](https://developer.squareup.com/docs/loyalty-api/overview#get-
 * discount-details).
 */
class LoyaltyProgramRewardDefinitionScope
{
    /**
     * The discount applies to the entire order.
     */
    const ORDER = 'ORDER';

    /**
     * The discount applies only to specific item variations.
     */
    const ITEM_VARIATION = 'ITEM_VARIATION';

    /**
     * The discount applies only to items in the given categories.
     */
    const CATEGORY = 'CATEGORY';
}
