<?php



namespace Square\Models;

/**
 * Defines supported stock levels of the item inventory.
 */
class SearchCatalogItemsRequestStockLevel
{
    /**
     * The item inventory is empty.
     */
    const OUT = 'OUT';

    /**
     * The item inventory is low.
     */
    const LOW = 'LOW';
}
