<?php



namespace Square\Models;

/**
 * Determines a seller's option on Quick Amounts feature.
 */
class CatalogQuickAmountsSettingsOption
{
    /**
     * Option for seller to disable Quick Amounts.
     */
    const DISABLED = 'DISABLED';

    /**
     * Option for seller to choose manually created Quick Amounts.
     */
    const MANUAL = 'MANUAL';

    /**
     * Option for seller to choose automatically created Quick Amounts.
     */
    const AUTO = 'AUTO';
}
