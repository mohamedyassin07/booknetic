<?php



namespace Square\Models;

/**
 * Indicates whether Square should alert the merchant when the inventory quantity of a
 * CatalogItemVariation is low.
 */
class InventoryAlertType
{
    /**
     * The variation does not display an alert.
     */
    const NONE = 'NONE';

    /**
     * The variation generates an alert when its quantity is low.
     */
    const LOW_QUANTITY = 'LOW_QUANTITY';
}
