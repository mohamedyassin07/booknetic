<?php



namespace Square\Models;

/**
 * Indicates the current verification status of a `BankAccount` object.
 */
class BankAccountStatus
{
    /**
     * Indicates that the verification process has started. Some features
     * (for example, creditable or debitable) may be provisionally enabled on the bank
     * account.
     */
    const VERIFICATION_IN_PROGRESS = 'VERIFICATION_IN_PROGRESS';

    /**
     * Indicates that the bank account was successfully verified.
     */
    const VERIFIED = 'VERIFIED';

    /**
     * Indicates that the bank account is disabled and is permanently unusable
     * for funds transfer. A bank account can be disabled because of a failed verification
     * attempt or a failed deposit attempt.
     */
    const DISABLED = 'DISABLED';
}
