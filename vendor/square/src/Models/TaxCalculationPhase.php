<?php



namespace Square\Models;

/**
 * When to calculate the taxes due on a cart.
 */
class TaxCalculationPhase
{
    /**
     * The fee is calculated based on the payment's subtotal.
     */
    const TAX_SUBTOTAL_PHASE = 'TAX_SUBTOTAL_PHASE';

    /**
     * The fee is calculated based on the payment's total.
     */
    const TAX_TOTAL_PHASE = 'TAX_TOTAL_PHASE';
}
