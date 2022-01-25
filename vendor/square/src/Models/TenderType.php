<?php



namespace Square\Models;

/**
 * Indicates a tender's type.
 */
class TenderType
{
    /**
     * A credit card.
     */
    const CARD = 'CARD';

    /**
     * Cash.
     */
    const CASH = 'CASH';

    /**
     * A credit card processed with a card processor other than Square.
     *
     * This value applies only to merchants in countries where Square does not
     * yet provide card processing.
     */
    const THIRD_PARTY_CARD = 'THIRD_PARTY_CARD';

    /**
     * A Square gift card.
     */
    const SQUARE_GIFT_CARD = 'SQUARE_GIFT_CARD';

    /**
     * This tender represents the register being opened for a "no sale" event.
     */
    const NO_SALE = 'NO_SALE';

    /**
     * A payment from a digital wallet, e.g. Cash App.
     *
     * Note: Some "digital wallets", including Google Pay and Apple Pay, facilitate
     * card payments.  Those payments have the `CARD` type.
     */
    const WALLET = 'WALLET';

    /**
     * A form of tender that does not match any other value.
     */
    const OTHER = 'OTHER';
}
