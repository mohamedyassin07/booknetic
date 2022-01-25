<?php



namespace Square\Models;

/**
 * Indicates a card's prepaid type, such as `NOT_PREPAID` or `PREPAID`.
 */
class CardPrepaidType
{
    const UNKNOWN_PREPAID_TYPE = 'UNKNOWN_PREPAID_TYPE';

    const NOT_PREPAID = 'NOT_PREPAID';

    const PREPAID = 'PREPAID';
}
