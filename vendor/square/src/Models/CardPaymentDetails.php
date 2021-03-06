<?php



namespace Square\Models;

/**
 * Reflects the current status of a card payment. Contains only non-confidential information.
 */
class CardPaymentDetails implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $status;

    /**
     * @var Card|null
     */
    private $card;

    /**
     * @var string|null
     */
    private $entryMethod;

    /**
     * @var string|null
     */
    private $cvvStatus;

    /**
     * @var string|null
     */
    private $avsStatus;

    /**
     * @var string|null
     */
    private $authResultCode;

    /**
     * @var string|null
     */
    private $applicationIdentifier;

    /**
     * @var string|null
     */
    private $applicationName;

    /**
     * @var string|null
     */
    private $applicationCryptogram;

    /**
     * @var string|null
     */
    private $verificationMethod;

    /**
     * @var string|null
     */
    private $verificationResults;

    /**
     * @var string|null
     */
    private $statementDescription;

    /**
     * @var DeviceDetails|null
     */
    private $deviceDetails;

    /**
     * @var CardPaymentTimeline|null
     */
    private $cardPaymentTimeline;

    /**
     * @var bool|null
     */
    private $refundRequiresCardPresence;

    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * Returns Status.
     *
     * The card payment's current state. The state can be AUTHORIZED, CAPTURED, VOIDED, or
     * FAILED.
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets Status.
     *
     * The card payment's current state. The state can be AUTHORIZED, CAPTURED, VOIDED, or
     * FAILED.
     *
     * @maps status
     */
    public function setStatus($status = null)
    {
        $this->status = $status;
    }

    /**
     * Returns Card.
     *
     * Represents the payment details of a card to be used for payments. These
     * details are determined by the payment token generated by Web Payments SDK.
     */
    public function getCard()
    {
        return $this->card;
    }

    /**
     * Sets Card.
     *
     * Represents the payment details of a card to be used for payments. These
     * details are determined by the payment token generated by Web Payments SDK.
     *
     * @maps card
     */
    public function setCard(Card $card = null)
    {
        $this->card = $card;
    }

    /**
     * Returns Entry Method.
     *
     * The method used to enter the card's details for the payment. The method can be
     * `KEYED`, `SWIPED`, `EMV`, `ON_FILE`, or `CONTACTLESS`.
     */
    public function getEntryMethod()
    {
        return $this->entryMethod;
    }

    /**
     * Sets Entry Method.
     *
     * The method used to enter the card's details for the payment. The method can be
     * `KEYED`, `SWIPED`, `EMV`, `ON_FILE`, or `CONTACTLESS`.
     *
     * @maps entry_method
     */
    public function setEntryMethod($entryMethod = null)
    {
        $this->entryMethod = $entryMethod;
    }

    /**
     * Returns Cvv Status.
     *
     * The status code returned from the Card Verification Value (CVV) check. The code can be
     * `CVV_ACCEPTED`, `CVV_REJECTED`, or `CVV_NOT_CHECKED`.
     */
    public function getCvvStatus()
    {
        return $this->cvvStatus;
    }

    /**
     * Sets Cvv Status.
     *
     * The status code returned from the Card Verification Value (CVV) check. The code can be
     * `CVV_ACCEPTED`, `CVV_REJECTED`, or `CVV_NOT_CHECKED`.
     *
     * @maps cvv_status
     */
    public function setCvvStatus($cvvStatus = null)
    {
        $this->cvvStatus = $cvvStatus;
    }

    /**
     * Returns Avs Status.
     *
     * The status code returned from the Address Verification System (AVS) check. The code can be
     * `AVS_ACCEPTED`, `AVS_REJECTED`, or `AVS_NOT_CHECKED`.
     */
    public function getAvsStatus()
    {
        return $this->avsStatus;
    }

    /**
     * Sets Avs Status.
     *
     * The status code returned from the Address Verification System (AVS) check. The code can be
     * `AVS_ACCEPTED`, `AVS_REJECTED`, or `AVS_NOT_CHECKED`.
     *
     * @maps avs_status
     */
    public function setAvsStatus($avsStatus = null)
    {
        $this->avsStatus = $avsStatus;
    }

    /**
     * Returns Auth Result Code.
     *
     * The status code returned by the card issuer that describes the payment's
     * authorization status.
     */
    public function getAuthResultCode()
    {
        return $this->authResultCode;
    }

    /**
     * Sets Auth Result Code.
     *
     * The status code returned by the card issuer that describes the payment's
     * authorization status.
     *
     * @maps auth_result_code
     */
    public function setAuthResultCode($authResultCode = null)
    {
        $this->authResultCode = $authResultCode;
    }

    /**
     * Returns Application Identifier.
     *
     * For EMV payments, the application ID identifies the EMV application used for the payment.
     */
    public function getApplicationIdentifier()
    {
        return $this->applicationIdentifier;
    }

    /**
     * Sets Application Identifier.
     *
     * For EMV payments, the application ID identifies the EMV application used for the payment.
     *
     * @maps application_identifier
     */
    public function setApplicationIdentifier($applicationIdentifier = null)
    {
        $this->applicationIdentifier = $applicationIdentifier;
    }

    /**
     * Returns Application Name.
     *
     * For EMV payments, the human-readable name of the EMV application used for the payment.
     */
    public function getApplicationName()
    {
        return $this->applicationName;
    }

    /**
     * Sets Application Name.
     *
     * For EMV payments, the human-readable name of the EMV application used for the payment.
     *
     * @maps application_name
     */
    public function setApplicationName($applicationName = null)
    {
        $this->applicationName = $applicationName;
    }

    /**
     * Returns Application Cryptogram.
     *
     * For EMV payments, the cryptogram generated for the payment.
     */
    public function getApplicationCryptogram()
    {
        return $this->applicationCryptogram;
    }

    /**
     * Sets Application Cryptogram.
     *
     * For EMV payments, the cryptogram generated for the payment.
     *
     * @maps application_cryptogram
     */
    public function setApplicationCryptogram($applicationCryptogram = null)
    {
        $this->applicationCryptogram = $applicationCryptogram;
    }

    /**
     * Returns Verification Method.
     *
     * For EMV payments, the method used to verify the cardholder's identity. The method can be
     * `PIN`, `SIGNATURE`, `PIN_AND_SIGNATURE`, `ON_DEVICE`, or `NONE`.
     */
    public function getVerificationMethod()
    {
        return $this->verificationMethod;
    }

    /**
     * Sets Verification Method.
     *
     * For EMV payments, the method used to verify the cardholder's identity. The method can be
     * `PIN`, `SIGNATURE`, `PIN_AND_SIGNATURE`, `ON_DEVICE`, or `NONE`.
     *
     * @maps verification_method
     */
    public function setVerificationMethod($verificationMethod = null)
    {
        $this->verificationMethod = $verificationMethod;
    }

    /**
     * Returns Verification Results.
     *
     * For EMV payments, the results of the cardholder verification. The result can be
     * `SUCCESS`, `FAILURE`, or `UNKNOWN`.
     */
    public function getVerificationResults()
    {
        return $this->verificationResults;
    }

    /**
     * Sets Verification Results.
     *
     * For EMV payments, the results of the cardholder verification. The result can be
     * `SUCCESS`, `FAILURE`, or `UNKNOWN`.
     *
     * @maps verification_results
     */
    public function setVerificationResults($verificationResults = null)
    {
        $this->verificationResults = $verificationResults;
    }

    /**
     * Returns Statement Description.
     *
     * The statement description sent to the card networks.
     *
     * Note: The actual statement description varies and is likely to be truncated and appended with
     * additional information on a per issuer basis.
     */
    public function getStatementDescription()
    {
        return $this->statementDescription;
    }

    /**
     * Sets Statement Description.
     *
     * The statement description sent to the card networks.
     *
     * Note: The actual statement description varies and is likely to be truncated and appended with
     * additional information on a per issuer basis.
     *
     * @maps statement_description
     */
    public function setStatementDescription($statementDescription = null)
    {
        $this->statementDescription = $statementDescription;
    }

    /**
     * Returns Device Details.
     *
     * Details about the device that took the payment.
     */
    public function getDeviceDetails()
    {
        return $this->deviceDetails;
    }

    /**
     * Sets Device Details.
     *
     * Details about the device that took the payment.
     *
     * @maps device_details
     */
    public function setDeviceDetails(DeviceDetails $deviceDetails = null)
    {
        $this->deviceDetails = $deviceDetails;
    }

    /**
     * Returns Card Payment Timeline.
     *
     * The timeline for card payments.
     */
    public function getCardPaymentTimeline()
    {
        return $this->cardPaymentTimeline;
    }

    /**
     * Sets Card Payment Timeline.
     *
     * The timeline for card payments.
     *
     * @maps card_payment_timeline
     */
    public function setCardPaymentTimeline(CardPaymentTimeline $cardPaymentTimeline = null)
    {
        $this->cardPaymentTimeline = $cardPaymentTimeline;
    }

    /**
     * Returns Refund Requires Card Presence.
     *
     * Whether the card must be physically present for the payment to
     * be refunded.  If set to `true`, the card must be present.
     */
    public function getRefundRequiresCardPresence()
    {
        return $this->refundRequiresCardPresence;
    }

    /**
     * Sets Refund Requires Card Presence.
     *
     * Whether the card must be physically present for the payment to
     * be refunded.  If set to `true`, the card must be present.
     *
     * @maps refund_requires_card_presence
     */
    public function setRefundRequiresCardPresence($refundRequiresCardPresence = null)
    {
        $this->refundRequiresCardPresence = $refundRequiresCardPresence;
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
        if (isset($this->status)) {
            $json['status']                        = $this->status;
        }
        if (isset($this->card)) {
            $json['card']                          = $this->card;
        }
        if (isset($this->entryMethod)) {
            $json['entry_method']                  = $this->entryMethod;
        }
        if (isset($this->cvvStatus)) {
            $json['cvv_status']                    = $this->cvvStatus;
        }
        if (isset($this->avsStatus)) {
            $json['avs_status']                    = $this->avsStatus;
        }
        if (isset($this->authResultCode)) {
            $json['auth_result_code']              = $this->authResultCode;
        }
        if (isset($this->applicationIdentifier)) {
            $json['application_identifier']        = $this->applicationIdentifier;
        }
        if (isset($this->applicationName)) {
            $json['application_name']              = $this->applicationName;
        }
        if (isset($this->applicationCryptogram)) {
            $json['application_cryptogram']        = $this->applicationCryptogram;
        }
        if (isset($this->verificationMethod)) {
            $json['verification_method']           = $this->verificationMethod;
        }
        if (isset($this->verificationResults)) {
            $json['verification_results']          = $this->verificationResults;
        }
        if (isset($this->statementDescription)) {
            $json['statement_description']         = $this->statementDescription;
        }
        if (isset($this->deviceDetails)) {
            $json['device_details']                = $this->deviceDetails;
        }
        if (isset($this->cardPaymentTimeline)) {
            $json['card_payment_timeline']         = $this->cardPaymentTimeline;
        }
        if (isset($this->refundRequiresCardPresence)) {
            $json['refund_requires_card_presence'] = $this->refundRequiresCardPresence;
        }
        if (isset($this->errors)) {
            $json['errors']                        = $this->errors;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
