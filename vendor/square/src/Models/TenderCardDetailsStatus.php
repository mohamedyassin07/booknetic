<?php



namespace Square\Models;

/**
 * Indicates the card transaction's current status.
 */
class TenderCardDetailsStatus
{
    /**
     * The card transaction has been authorized but not yet captured.
     */
    const AUTHORIZED = 'AUTHORIZED';

    /**
     * The card transaction was authorized and subsequently captured (i.e., completed).
     */
    const CAPTURED = 'CAPTURED';

    /**
     * The card transaction was authorized and subsequently voided (i.e., canceled).
     */
    const VOIDED = 'VOIDED';

    /**
     * The card transaction failed.
     */
    const FAILED = 'FAILED';
}
