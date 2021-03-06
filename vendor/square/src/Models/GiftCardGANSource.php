<?php



namespace Square\Models;

/**
 * Indicates the source that generated the gift card
 * account number (GAN).
 */
class GiftCardGANSource
{
    /**
     * The gift card account number (GAN) is generated by Square.
     */
    const SQUARE = 'SQUARE';

    /**
     * The gift card account number (GAN) is imported from a non-Square system.
     * For more information, see
     * [Third-party gift cards](https://developer.squareup.com/docs/gift-cards/using-gift-cards-api#third-
     * party-gift-cards).
     */
    const OTHER = 'OTHER';
}
