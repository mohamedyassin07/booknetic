<?php



namespace Square\Models;

/**
 * Indicates the Square product used to process a transaction.
 */
class TransactionProduct
{
    /**
     * Square Point of Sale.
     */
    const REGISTER = 'REGISTER';

    /**
     * The Square Connect API.
     */
    const EXTERNAL_API = 'EXTERNAL_API';

    /**
     * A Square subscription for one of multiple products.
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
     * A Square product that does not match any other value.
     */
    const OTHER = 'OTHER';
}
