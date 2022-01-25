<?php



namespace Square\Models;

/**
 * Indicates how the inventory change was applied to a tracked product quantity.
 */
class InventoryChangeType
{
    /**
     * The change occurred as part of a physical count update.
     */
    const PHYSICAL_COUNT = 'PHYSICAL_COUNT';

    /**
     * The change occurred as part of the normal lifecycle of goods
     * (e.g., as an inventory adjustment).
     */
    const ADJUSTMENT = 'ADJUSTMENT';

    /**
     * The change occurred as part of an inventory transfer.
     */
    const TRANSFER = 'TRANSFER';
}
