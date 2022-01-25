<?php



namespace Square\Models;

/**
 * Indicates the Square product used to generate an inventory change.
 */
class Product
{
    /**
     * Square Point of Sale application.
     */
    const SQUARE_POS = 'SQUARE_POS';

    /**
     * Square Connect APIs (Transactions API, Checkout API).
     */
    const EXTERNAL_API = 'EXTERNAL_API';

    /**
     * A Square subscription (various products).
     */
    const BILLING = 'BILLING';

    /**
     * Square Appointments.
     */
    const APPOINTMENTS = 'APPOINTMENTS';

    /**
     * Square Invoices.
     */
    const INVOICES = 'INVOICES';

    /**
     * Square Online Store.
     */
    const ONLINE_STORE = 'ONLINE_STORE';

    /**
     * Square Payroll.
     */
    const PAYROLL = 'PAYROLL';

    /**
     * Square Dashboard
     */
    const DASHBOARD = 'DASHBOARD';

    /**
     * Item Library Import
     */
    const ITEM_LIBRARY_IMPORT = 'ITEM_LIBRARY_IMPORT';

    /**
     * A Square product that does not match any other value.
     */
    const OTHER = 'OTHER';
}
