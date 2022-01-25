<?php



namespace Square\Models;

/**
 * Indicates whether the price of a CatalogItemVariation should be entered manually at the time of
 * sale.
 */
class CatalogPricingType
{
    /**
     * The catalog item variation's price is fixed.
     */
    const FIXED_PRICING = 'FIXED_PRICING';

    /**
     * The catalog item variation's price is entered at the time of sale.
     */
    const VARIABLE_PRICING = 'VARIABLE_PRICING';
}
