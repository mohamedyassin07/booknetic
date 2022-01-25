<?php



namespace Square\Models;

/**
 * Additional details about BANK_ACCOUNT type payments.
 */
class BankAccountPaymentDetails implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $bankName;

    /**
     * @var string|null
     */
    private $transferType;

    /**
     * @var string|null
     */
    private $accountOwnershipType;

    /**
     * @var string|null
     */
    private $fingerprint;

    /**
     * @var string|null
     */
    private $country;

    /**
     * @var string|null
     */
    private $statementDescription;

    /**
     * @var ACHDetails|null
     */
    private $achDetails;

    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * Returns Bank Name.
     *
     * The name of the bank associated with the bank account.
     */
    public function getBankName()
    {
        return $this->bankName;
    }

    /**
     * Sets Bank Name.
     *
     * The name of the bank associated with the bank account.
     *
     * @maps bank_name
     */
    public function setBankName($bankName = null)
    {
        $this->bankName = $bankName;
    }

    /**
     * Returns Transfer Type.
     *
     * The type of the bank transfer. The type can be `ACH` or `UNKNOWN`.
     */
    public function getTransferType()
    {
        return $this->transferType;
    }

    /**
     * Sets Transfer Type.
     *
     * The type of the bank transfer. The type can be `ACH` or `UNKNOWN`.
     *
     * @maps transfer_type
     */
    public function setTransferType($transferType = null)
    {
        $this->transferType = $transferType;
    }

    /**
     * Returns Account Ownership Type.
     *
     * The ownership type of the bank account performing the transfer.
     * The type can be `INDIVIDUAL`, `COMPANY`, or `UNKNOWN`.
     */
    public function getAccountOwnershipType()
    {
        return $this->accountOwnershipType;
    }

    /**
     * Sets Account Ownership Type.
     *
     * The ownership type of the bank account performing the transfer.
     * The type can be `INDIVIDUAL`, `COMPANY`, or `UNKNOWN`.
     *
     * @maps account_ownership_type
     */
    public function setAccountOwnershipType($accountOwnershipType = null)
    {
        $this->accountOwnershipType = $accountOwnershipType;
    }

    /**
     * Returns Fingerprint.
     *
     * Uniquely identifies the bank account for this seller and can be used
     * to determine if payments are from the same bank account.
     */
    public function getFingerprint()
    {
        return $this->fingerprint;
    }

    /**
     * Sets Fingerprint.
     *
     * Uniquely identifies the bank account for this seller and can be used
     * to determine if payments are from the same bank account.
     *
     * @maps fingerprint
     */
    public function setFingerprint($fingerprint = null)
    {
        $this->fingerprint = $fingerprint;
    }

    /**
     * Returns Country.
     *
     * The two-letter ISO code representing the country the bank account is located in.
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Sets Country.
     *
     * The two-letter ISO code representing the country the bank account is located in.
     *
     * @maps country
     */
    public function setCountry($country = null)
    {
        $this->country = $country;
    }

    /**
     * Returns Statement Description.
     *
     * The statement description as sent to the bank.
     */
    public function getStatementDescription()
    {
        return $this->statementDescription;
    }

    /**
     * Sets Statement Description.
     *
     * The statement description as sent to the bank.
     *
     * @maps statement_description
     */
    public function setStatementDescription($statementDescription = null)
    {
        $this->statementDescription = $statementDescription;
    }

    /**
     * Returns Ach Details.
     *
     * ACH-specific details about `BANK_ACCOUNT` type payments with the `transfer_type` of `ACH`.
     */
    public function getAchDetails()
    {
        return $this->achDetails;
    }

    /**
     * Sets Ach Details.
     *
     * ACH-specific details about `BANK_ACCOUNT` type payments with the `transfer_type` of `ACH`.
     *
     * @maps ach_details
     */
    public function setAchDetails(ACHDetails $achDetails = null)
    {
        $this->achDetails = $achDetails;
    }

    /**
     * Returns Errors.
     *
     * Information about errors encountered during the request.
     *
     * @return Error[]|null
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * Sets Errors.
     *
     * Information about errors encountered during the request.
     *
     * @maps errors
     *
     * @param Error[]|null $errors
     */
    public function setErrors(array $errors = null)
    {
        $this->errors = $errors;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->bankName)) {
            $json['bank_name']              = $this->bankName;
        }
        if (isset($this->transferType)) {
            $json['transfer_type']          = $this->transferType;
        }
        if (isset($this->accountOwnershipType)) {
            $json['account_ownership_type'] = $this->accountOwnershipType;
        }
        if (isset($this->fingerprint)) {
            $json['fingerprint']            = $this->fingerprint;
        }
        if (isset($this->country)) {
            $json['country']                = $this->country;
        }
        if (isset($this->statementDescription)) {
            $json['statement_description']  = $this->statementDescription;
        }
        if (isset($this->achDetails)) {
            $json['ach_details']            = $this->achDetails;
        }
        if (isset($this->errors)) {
            $json['errors']                 = $this->errors;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
