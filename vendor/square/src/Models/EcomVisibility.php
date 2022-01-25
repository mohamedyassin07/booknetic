<?php



namespace Square\Models;

/**
 * Determines item visibility in Ecom (Online Store) and Online Checkout.
 */
class EcomVisibility
{
    /**
     * Item is not synced with Ecom (Weebly). This is the default state
     */
    const UNINDEXED = 'UNINDEXED';

    /**
     * Item is synced but is unavailable within Ecom (Weebly) and Online Checkout
     */
    const UNAVAILABLE = 'UNAVAILABLE';

    /**
     * Option for seller to choose manually created Quick Amounts.
     */
    const HIDDEN = 'HIDDEN';

    /**
     * Item is synced but available within Ecom (Weebly) and Online Checkout but is hidden from Ecom Store.
     */
    const VISIBLE = 'VISIBLE';
}
