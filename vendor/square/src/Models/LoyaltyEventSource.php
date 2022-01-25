<?php



namespace Square\Models;

/**
 * Defines whether the event was generated by the Square Point of Sale.
 */
class LoyaltyEventSource
{
    /**
     * The event is generated by the Square Point of Sale (POS).
     */
    const SQUARE = 'SQUARE';

    /**
     * The event is generated by something other than the Square Point of Sale that used the Loyalty API.
     */
    const LOYALTY_API = 'LOYALTY_API';
}