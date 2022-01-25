<?php



namespace Square\Models;

/**
 * The type of a CatalogItem. Connect V2 only allows the creation of `REGULAR` or
 * `APPOINTMENTS_SERVICE` items.
 */
class CatalogItemProductType
{
    /**
     * An ordinary item.
     */
    const REGULAR = 'REGULAR';

    /**
     * A Square gift card.
     */
    const GIFT_CARD = 'GIFT_CARD';

    /**
     * A service that can be booked using the Square Appointments app.
     */
    const APPOINTMENTS_SERVICE = 'APPOINTMENTS_SERVICE';
}
