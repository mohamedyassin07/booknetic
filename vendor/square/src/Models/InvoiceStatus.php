<?php



namespace Square\Models;

/**
 * Indicates the status of an invoice.
 */
class InvoiceStatus
{
    /**
     * The invoice is a draft. You must publish a draft invoice before Square can process it.
     * A draft invoice has no `public_url`, so it is not available to customers.
     */
    const DRAFT = 'DRAFT';

    /**
     * The invoice is published but not yet paid.
     */
    const UNPAID = 'UNPAID';

    /**
     * The invoice is scheduled to be processed. On the scheduled date,
     * Square sends the invoice, initiates an automatic payment, or takes no action, depending on
     * the delivery method and payment request settings. Square also sets the invoice status to the
     * appropriate state: `UNPAID`, `PAID`, `PARTIALLY_PAID`, or `PAYMENT_PENDING`.
     */
    const SCHEDULED = 'SCHEDULED';

    /**
     * A partial payment is received for the invoice.
     */
    const PARTIALLY_PAID = 'PARTIALLY_PAID';

    /**
     * The customer paid the invoice in full.
     */
    const PAID = 'PAID';

    /**
     * The invoice is paid (or partially paid) and some but not all the amount paid is
     * refunded.
     */
    const PARTIALLY_REFUNDED = 'PARTIALLY_REFUNDED';

    /**
     * The full amount that the customer paid for the invoice is refunded.
     */
    const REFUNDED = 'REFUNDED';

    /**
     * The invoice is canceled. Square no longer requests payments from the customer.
     * The `public_url` page remains and is accessible, but it displays the invoice
     * as canceled and does not accept payment.
     */
    const CANCELED = 'CANCELED';

    /**
     * Square canceled the invoice due to suspicious activity.
     */
    const FAILED = 'FAILED';

    /**
     * A payment on the invoice was initiated but has not yet been processed.
     *
     * When in this state, invoices cannot be updated and other payments cannot be initiated.
     */
    const PAYMENT_PENDING = 'PAYMENT_PENDING';
}
