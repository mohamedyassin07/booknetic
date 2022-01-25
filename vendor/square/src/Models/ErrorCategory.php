<?php



namespace Square\Models;

/**
 * Indicates which high-level category of error has occurred during a
 * request to the Connect API.
 */
class ErrorCategory
{
    /**
     * An error occurred with the Connect API itself.
     */
    const API_ERROR = 'API_ERROR';

    /**
     * An authentication error occurred. Most commonly, the request had
     * a missing, malformed, or otherwise invalid `Authorization` header.
     */
    const AUTHENTICATION_ERROR = 'AUTHENTICATION_ERROR';

    /**
     * The request was invalid. Most commonly, a required parameter was
     * missing, or a provided parameter had an invalid value.
     */
    const INVALID_REQUEST_ERROR = 'INVALID_REQUEST_ERROR';

    /**
     * Your application reached the Connect API rate limit. Retry your
     * request after a while.
     */
    const RATE_LIMIT_ERROR = 'RATE_LIMIT_ERROR';

    /**
     * An error occurred while processing a payment method. Most commonly,
     * the details of the payment method were invalid (such as a card's CVV
     * or expiration date).
     */
    const PAYMENT_METHOD_ERROR = 'PAYMENT_METHOD_ERROR';

    /**
     * An error occurred while attempting to process a refund.
     */
    const REFUND_ERROR = 'REFUND_ERROR';

    /**
     * An error occurred when checking a merchant subscription status
     */
    const MERCHANT_SUBSCRIPTION_ERROR = 'MERCHANT_SUBSCRIPTION_ERROR';
}
