<?php



namespace Square\Models;

/**
 * Indicates the financial purpose of the bank account.
 */
class BankAccountType
{
    /**
     * An account at a financial institution against which checks can be
     * drawn by the account depositor.
     */
    const CHECKING = 'CHECKING';

    /**
     * An account at a financial institution that pays interest but cannot be
     * used directly as money in the narrow sense of a medium of exchange.
     */
    const SAVINGS = 'SAVINGS';

    /**
     * An account at a financial institution that contains a deposit of funds
     * and/or securities.
     */
    const INVESTMENT = 'INVESTMENT';

    /**
     * An account at a financial institution which cannot be described by the
     * other types.
     */
    const OTHER = 'OTHER';

    /**
     * An account at a financial institution against which checks can be
     * drawn specifically for business purposes (non-personal use).
     */
    const BUSINESS_CHECKING = 'BUSINESS_CHECKING';
}
