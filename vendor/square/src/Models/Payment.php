<?php



namespace Square\Models;

/**
 * Represents a payment processed by the Square API.
 */
class Payment implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $id;

    /**
     * @var string|null
     */
    private $createdAt;

    /**
     * @var string|null
     */
    private $updatedAt;

    /**
     * @var Money|null
     */
    private $amountMoney;

    /**
     * @var Money|null
     */
    private $tipMoney;

    /**
     * @var Money|null
     */
    private $totalMoney;

    /**
     * @var Money|null
     */
    private $appFeeMoney;

    /**
     * @var Money|null
     */
    private $approvedMoney;

    /**
     * @var ProcessingFee[]|null
     */
    private $processingFee;

    /**
     * @var Money|null
     */
    private $refundedMoney;

    /**
     * @var string|null
     */
    private $status;

    /**
     * @var string|null
     */
    private $delayDuration;

    /**
     * @var string|null
     */
    private $delayAction;

    /**
     * @var string|null
     */
    private $delayedUntil;

    /**
     * @var string|null
     */
    private $sourceType;

    /**
     * @var CardPaymentDetails|null
     */
    private $cardDetails;

    /**
     * @var CashPaymentDetails|null
     */
    private $cashDetails;

    /**
     * @var BankAccountPaymentDetails|null
     */
    private $bankAccountDetails;

    /**
     * @var ExternalPaymentDetails|null
     */
    private $externalDetails;

    /**
     * @var DigitalWalletDetails|null
     */
    private $walletDetails;

    /**
     * @var string|null
     */
    private $locationId;

    /**
     * @var string|null
     */
    private $orderId;

    /**
     * @var string|null
     */
    private $referenceId;

    /**
     * @var string|null
     */
    private $customerId;

    /**
     * @var string|null
     */
    private $employeeId;

    /**
     * @var string[]|null
     */
    private $refundIds;

    /**
     * @var RiskEvaluation|null
     */
    private $riskEvaluation;

    /**
     * @var string|null
     */
    private $buyerEmailAddress;

    /**
     * @var Address|null
     */
    private $billingAddress;

    /**
     * @var Address|null
     */
    private $shippingAddress;

    /**
     * @var string|null
     */
    private $note;

    /**
     * @var string|null
     */
    private $statementDescriptionIdentifier;

    /**
     * @var string[]|null
     */
    private $capabilities;

    /**
     * @var string|null
     */
    private $receiptNumber;

    /**
     * @var string|null
     */
    private $receiptUrl;

    /**
     * @var string|null
     */
    private $versionToken;

    /**
     * Returns Id.
     *
     * A unique ID for the payment.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * A unique ID for the payment.
     *
     * @maps id
     */
    public function setId($id = null)
    {
        $this->id = $id;
    }

    /**
     * Returns Created At.
     *
     * The timestamp of when the payment was created, in RFC 3339 format.
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Sets Created At.
     *
     * The timestamp of when the payment was created, in RFC 3339 format.
     *
     * @maps created_at
     */
    public function setCreatedAt($createdAt = null)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Returns Updated At.
     *
     * The timestamp of when the payment was last updated, in RFC 3339 format.
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Sets Updated At.
     *
     * The timestamp of when the payment was last updated, in RFC 3339 format.
     *
     * @maps updated_at
     */
    public function setUpdatedAt($updatedAt = null)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * Returns Amount Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getAmountMoney()
    {
        return $this->amountMoney;
    }

    /**
     * Sets Amount Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps amount_money
     */
    public function setAmountMoney(Money $amountMoney = null)
    {
        $this->amountMoney = $amountMoney;
    }

    /**
     * Returns Tip Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getTipMoney()
    {
        return $this->tipMoney;
    }

    /**
     * Sets Tip Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps tip_money
     */
    public function setTipMoney(Money $tipMoney = null)
    {
        $this->tipMoney = $tipMoney;
    }

    /**
     * Returns Total Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getTotalMoney()
    {
        return $this->totalMoney;
    }

    /**
     * Sets Total Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps total_money
     */
    public function setTotalMoney(Money $totalMoney = null)
    {
        $this->totalMoney = $totalMoney;
    }

    /**
     * Returns App Fee Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getAppFeeMoney()
    {
        return $this->appFeeMoney;
    }

    /**
     * Sets App Fee Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps app_fee_money
     */
    public function setAppFeeMoney(Money $appFeeMoney = null)
    {
        $this->appFeeMoney = $appFeeMoney;
    }

    /**
     * Returns Approved Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getApprovedMoney()
    {
        return $this->approvedMoney;
    }

    /**
     * Sets Approved Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps approved_money
     */
    public function setApprovedMoney(Money $approvedMoney = null)
    {
        $this->approvedMoney = $approvedMoney;
    }

    /**
     * Returns Processing Fee.
     *
     * The processing fees and fee adjustments assessed by Square for this payment.
     *
     * @return ProcessingFee[]|null
     */
    public function getProcessingFee()
    {
        return $this->processingFee;
    }

    /**
     * Sets Processing Fee.
     *
     * The processing fees and fee adjustments assessed by Square for this payment.
     *
     * @maps processing_fee
     *
     * @param ProcessingFee[]|null $processingFee
     */
    public function setProcessingFee(array $processingFee = null)
    {
        $this->processingFee = $processingFee;
    }

    /**
     * Returns Refunded Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getRefundedMoney()
    {
        return $this->refundedMoney;
    }

    /**
     * Sets Refunded Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps refunded_money
     */
    public function setRefundedMoney(Money $refundedMoney = null)
    {
        $this->refundedMoney = $refundedMoney;
    }

    /**
     * Returns Status.
     *
     * Indicates whether the payment is APPROVED, PENDING, COMPLETED, CANCELED, or FAILED.
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets Status.
     *
     * Indicates whether the payment is APPROVED, PENDING, COMPLETED, CANCELED, or FAILED.
     *
     * @maps status
     */
    public function setStatus($status = null)
    {
        $this->status = $status;
    }

    /**
     * Returns Delay Duration.
     *
     * The duration of time after the payment's creation when Square automatically applies the
     * `delay_action` to the payment. This automatic `delay_action` applies only to payments that
     * do not reach a terminal state (COMPLETED, CANCELED, or FAILED) before the `delay_duration`
     * time period.
     *
     * This field is specified as a time duration, in RFC 3339 format.
     *
     * Notes:
     * This feature is only supported for card payments.
     *
     * Default:
     *
     * - Card-present payments: "PT36H" (36 hours) from the creation time.
     * - Card-not-present payments: "P7D" (7 days) from the creation time.
     */
    public function getDelayDuration()
    {
        return $this->delayDuration;
    }

    /**
     * Sets Delay Duration.
     *
     * The duration of time after the payment's creation when Square automatically applies the
     * `delay_action` to the payment. This automatic `delay_action` applies only to payments that
     * do not reach a terminal state (COMPLETED, CANCELED, or FAILED) before the `delay_duration`
     * time period.
     *
     * This field is specified as a time duration, in RFC 3339 format.
     *
     * Notes:
     * This feature is only supported for card payments.
     *
     * Default:
     *
     * - Card-present payments: "PT36H" (36 hours) from the creation time.
     * - Card-not-present payments: "P7D" (7 days) from the creation time.
     *
     * @maps delay_duration
     */
    public function setDelayDuration($delayDuration = null)
    {
        $this->delayDuration = $delayDuration;
    }

    /**
     * Returns Delay Action.
     *
     * The action to be applied to the payment when the `delay_duration` has elapsed. This field
     * is read-only.
     *
     * Current values include `CANCEL`.
     */
    public function getDelayAction()
    {
        return $this->delayAction;
    }

    /**
     * Sets Delay Action.
     *
     * The action to be applied to the payment when the `delay_duration` has elapsed. This field
     * is read-only.
     *
     * Current values include `CANCEL`.
     *
     * @maps delay_action
     */
    public function setDelayAction($delayAction = null)
    {
        $this->delayAction = $delayAction;
    }

    /**
     * Returns Delayed Until.
     *
     * The read-only timestamp of when the `delay_action` is automatically applied,
     * in RFC 3339 format.
     *
     * Note that this field is calculated by summing the payment's `delay_duration` and `created_at`
     * fields. The `created_at` field is generated by Square and might not exactly match the
     * time on your local machine.
     */
    public function getDelayedUntil()
    {
        return $this->delayedUntil;
    }

    /**
     * Sets Delayed Until.
     *
     * The read-only timestamp of when the `delay_action` is automatically applied,
     * in RFC 3339 format.
     *
     * Note that this field is calculated by summing the payment's `delay_duration` and `created_at`
     * fields. The `created_at` field is generated by Square and might not exactly match the
     * time on your local machine.
     *
     * @maps delayed_until
     */
    public function setDelayedUntil($delayedUntil = null)
    {
        $this->delayedUntil = $delayedUntil;
    }

    /**
     * Returns Source Type.
     *
     * The source type for this payment.
     *
     * Current values include `CARD`, `BANK_ACCOUNT`, `WALLET`, `CASH`, or `EXTERNAL`.
     */
    public function getSourceType()
    {
        return $this->sourceType;
    }

    /**
     * Sets Source Type.
     *
     * The source type for this payment.
     *
     * Current values include `CARD`, `BANK_ACCOUNT`, `WALLET`, `CASH`, or `EXTERNAL`.
     *
     * @maps source_type
     */
    public function setSourceType($sourceType = null)
    {
        $this->sourceType = $sourceType;
    }

    /**
     * Returns Card Details.
     *
     * Reflects the current status of a card payment. Contains only non-confidential information.
     */
    public function getCardDetails()
    {
        return $this->cardDetails;
    }

    /**
     * Sets Card Details.
     *
     * Reflects the current status of a card payment. Contains only non-confidential information.
     *
     * @maps card_details
     */
    public function setCardDetails(CardPaymentDetails $cardDetails = null)
    {
        $this->cardDetails = $cardDetails;
    }

    /**
     * Returns Cash Details.
     *
     * Stores details about a cash payment. Contains only non-confidential information. For more
     * information, see
     * [Take Cash Payments](https://developer.squareup.com/docs/payments-api/take-payments/cash-payments).
     */
    public function getCashDetails()
    {
        return $this->cashDetails;
    }

    /**
     * Sets Cash Details.
     *
     * Stores details about a cash payment. Contains only non-confidential information. For more
     * information, see
     * [Take Cash Payments](https://developer.squareup.com/docs/payments-api/take-payments/cash-payments).
     *
     * @maps cash_details
     */
    public function setCashDetails(CashPaymentDetails $cashDetails = null)
    {
        $this->cashDetails = $cashDetails;
    }

    /**
     * Returns Bank Account Details.
     *
     * Additional details about BANK_ACCOUNT type payments.
     */
    public function getBankAccountDetails()
    {
        return $this->bankAccountDetails;
    }

    /**
     * Sets Bank Account Details.
     *
     * Additional details about BANK_ACCOUNT type payments.
     *
     * @maps bank_account_details
     */
    public function setBankAccountDetails(BankAccountPaymentDetails $bankAccountDetails = null)
    {
        $this->bankAccountDetails = $bankAccountDetails;
    }

    /**
     * Returns External Details.
     *
     * Stores details about an external payment. Contains only non-confidential information.
     * For more information, see
     * [Take External Payments](https://developer.squareup.com/docs/payments-api/take-payments/external-
     * payments).
     */
    public function getExternalDetails()
    {
        return $this->externalDetails;
    }

    /**
     * Sets External Details.
     *
     * Stores details about an external payment. Contains only non-confidential information.
     * For more information, see
     * [Take External Payments](https://developer.squareup.com/docs/payments-api/take-payments/external-
     * payments).
     *
     * @maps external_details
     */
    public function setExternalDetails(ExternalPaymentDetails $externalDetails = null)
    {
        $this->externalDetails = $externalDetails;
    }

    /**
     * Returns Wallet Details.
     *
     * Additional details about `WALLET` type payments. Contains only non-confidential information.
     */
    public function getWalletDetails()
    {
        return $this->walletDetails;
    }

    /**
     * Sets Wallet Details.
     *
     * Additional details about `WALLET` type payments. Contains only non-confidential information.
     *
     * @maps wallet_details
     */
    public function setWalletDetails(DigitalWalletDetails $walletDetails = null)
    {
        $this->walletDetails = $walletDetails;
    }

    /**
     * Returns Location Id.
     *
     * The ID of the location associated with the payment.
     */
    public function getLocationId()
    {
        return $this->locationId;
    }

    /**
     * Sets Location Id.
     *
     * The ID of the location associated with the payment.
     *
     * @maps location_id
     */
    public function setLocationId($locationId = null)
    {
        $this->locationId = $locationId;
    }

    /**
     * Returns Order Id.
     *
     * The ID of the order associated with the payment.
     */
    public function getOrderId()
    {
        return $this->orderId;
    }

    /**
     * Sets Order Id.
     *
     * The ID of the order associated with the payment.
     *
     * @maps order_id
     */
    public function setOrderId($orderId = null)
    {
        $this->orderId = $orderId;
    }

    /**
     * Returns Reference Id.
     *
     * An optional ID that associates the payment with an entity in
     * another system.
     */
    public function getReferenceId()
    {
        return $this->referenceId;
    }

    /**
     * Sets Reference Id.
     *
     * An optional ID that associates the payment with an entity in
     * another system.
     *
     * @maps reference_id
     */
    public function setReferenceId($referenceId = null)
    {
        $this->referenceId = $referenceId;
    }

    /**
     * Returns Customer Id.
     *
     * The [Customer]($m/Customer) ID of the customer associated with the payment.
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * Sets Customer Id.
     *
     * The [Customer]($m/Customer) ID of the customer associated with the payment.
     *
     * @maps customer_id
     */
    public function setCustomerId($customerId = null)
    {
        $this->customerId = $customerId;
    }

    /**
     * Returns Employee Id.
     *
     * An optional ID of the employee associated with taking the payment.
     */
    public function getEmployeeId()
    {
        return $this->employeeId;
    }

    /**
     * Sets Employee Id.
     *
     * An optional ID of the employee associated with taking the payment.
     *
     * @maps employee_id
     */
    public function setEmployeeId($employeeId = null)
    {
        $this->employeeId = $employeeId;
    }

    /**
     * Returns Refund Ids.
     *
     * A list of `refund_id`s identifying refunds for the payment.
     *
     * @return string[]|null
     */
    public function getRefundIds()
    {
        return $this->refundIds;
    }

    /**
     * Sets Refund Ids.
     *
     * A list of `refund_id`s identifying refunds for the payment.
     *
     * @maps refund_ids
     *
     * @param string[]|null $refundIds
     */
    public function setRefundIds(array $refundIds = null)
    {
        $this->refundIds = $refundIds;
    }

    /**
     * Returns Risk Evaluation.
     *
     * Represents fraud risk information for the associated payment.
     *
     * When you take a payment through Square's Payments API (using the `CreatePayment`
     * endpoint), Square evaluates it and assigns a risk level to the payment. Sellers
     * can use this information to determine the course of action (for example,
     * provide the goods/services or refund the payment).
     */
    public function getRiskEvaluation()
    {
        return $this->riskEvaluation;
    }

    /**
     * Sets Risk Evaluation.
     *
     * Represents fraud risk information for the associated payment.
     *
     * When you take a payment through Square's Payments API (using the `CreatePayment`
     * endpoint), Square evaluates it and assigns a risk level to the payment. Sellers
     * can use this information to determine the course of action (for example,
     * provide the goods/services or refund the payment).
     *
     * @maps risk_evaluation
     */
    public function setRiskEvaluation(RiskEvaluation $riskEvaluation = null)
    {
        $this->riskEvaluation = $riskEvaluation;
    }

    /**
     * Returns Buyer Email Address.
     *
     * The buyer's email address.
     */
    public function getBuyerEmailAddress()
    {
        return $this->buyerEmailAddress;
    }

    /**
     * Sets Buyer Email Address.
     *
     * The buyer's email address.
     *
     * @maps buyer_email_address
     */
    public function setBuyerEmailAddress($buyerEmailAddress = null)
    {
        $this->buyerEmailAddress = $buyerEmailAddress;
    }

    /**
     * Returns Billing Address.
     *
     * Represents a physical address.
     */
    public function getBillingAddress()
    {
        return $this->billingAddress;
    }

    /**
     * Sets Billing Address.
     *
     * Represents a physical address.
     *
     * @maps billing_address
     */
    public function setBillingAddress(Address $billingAddress = null)
    {
        $this->billingAddress = $billingAddress;
    }

    /**
     * Returns Shipping Address.
     *
     * Represents a physical address.
     */
    public function getShippingAddress()
    {
        return $this->shippingAddress;
    }

    /**
     * Sets Shipping Address.
     *
     * Represents a physical address.
     *
     * @maps shipping_address
     */
    public function setShippingAddress(Address $shippingAddress = null)
    {
        $this->shippingAddress = $shippingAddress;
    }

    /**
     * Returns Note.
     *
     * An optional note to include when creating a payment.
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Sets Note.
     *
     * An optional note to include when creating a payment.
     *
     * @maps note
     */
    public function setNote($note = null)
    {
        $this->note = $note;
    }

    /**
     * Returns Statement Description Identifier.
     *
     * Additional payment information that gets added to the customer's card statement
     * as part of the statement description.
     *
     * Note that the `statement_description_identifier` might get truncated on the statement description
     * to fit the required information including the Square identifier (SQ *) and the name of the
     * seller taking the payment.
     */
    public function getStatementDescriptionIdentifier()
    {
        return $this->statementDescriptionIdentifier;
    }

    /**
     * Sets Statement Description Identifier.
     *
     * Additional payment information that gets added to the customer's card statement
     * as part of the statement description.
     *
     * Note that the `statement_description_identifier` might get truncated on the statement description
     * to fit the required information including the Square identifier (SQ *) and the name of the
     * seller taking the payment.
     *
     * @maps statement_description_identifier
     */
    public function setStatementDescriptionIdentifier($statementDescriptionIdentifier = null)
    {
        $this->statementDescriptionIdentifier = $statementDescriptionIdentifier;
    }

    /**
     * Returns Capabilities.
     *
     * Actions that can be performed on this payment:
     * - `EDIT_AMOUNT_UP` - The payment amount can be edited up.
     * - `EDIT_AMOUNT_DOWN` - The payment amount can be edited down.
     * - `EDIT_TIP_AMOUNT_UP` - The tip amount can be edited up.
     * - `EDIT_TIP_AMOUNT_DOWN` - The tip amount can be edited down.
     *
     * @return string[]|null
     */
    public function getCapabilities()
    {
        return $this->capabilities;
    }

    /**
     * Sets Capabilities.
     *
     * Actions that can be performed on this payment:
     * - `EDIT_AMOUNT_UP` - The payment amount can be edited up.
     * - `EDIT_AMOUNT_DOWN` - The payment amount can be edited down.
     * - `EDIT_TIP_AMOUNT_UP` - The tip amount can be edited up.
     * - `EDIT_TIP_AMOUNT_DOWN` - The tip amount can be edited down.
     *
     * @maps capabilities
     *
     * @param string[]|null $capabilities
     */
    public function setCapabilities(array $capabilities = null)
    {
        $this->capabilities = $capabilities;
    }

    /**
     * Returns Receipt Number.
     *
     * The payment's receipt number.
     * The field is missing if a payment is canceled.
     */
    public function getReceiptNumber()
    {
        return $this->receiptNumber;
    }

    /**
     * Sets Receipt Number.
     *
     * The payment's receipt number.
     * The field is missing if a payment is canceled.
     *
     * @maps receipt_number
     */
    public function setReceiptNumber($receiptNumber = null)
    {
        $this->receiptNumber = $receiptNumber;
    }

    /**
     * Returns Receipt Url.
     *
     * The URL for the payment's receipt.
     * The field is only populated for COMPLETED payments.
     */
    public function getReceiptUrl()
    {
        return $this->receiptUrl;
    }

    /**
     * Sets Receipt Url.
     *
     * The URL for the payment's receipt.
     * The field is only populated for COMPLETED payments.
     *
     * @maps receipt_url
     */
    public function setReceiptUrl($receiptUrl = null)
    {
        $this->receiptUrl = $receiptUrl;
    }

    /**
     * Returns Version Token.
     *
     * Used for optimistic concurrency. This opaque token identifies a specific version of the
     * `Payment` object.
     */
    public function getVersionToken()
    {
        return $this->versionToken;
    }

    /**
     * Sets Version Token.
     *
     * Used for optimistic concurrency. This opaque token identifies a specific version of the
     * `Payment` object.
     *
     * @maps version_token
     */
    public function setVersionToken($versionToken = null)
    {
        $this->versionToken = $versionToken;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->id)) {
            $json['id']                               = $this->id;
        }
        if (isset($this->createdAt)) {
            $json['created_at']                       = $this->createdAt;
        }
        if (isset($this->updatedAt)) {
            $json['updated_at']                       = $this->updatedAt;
        }
        if (isset($this->amountMoney)) {
            $json['amount_money']                     = $this->amountMoney;
        }
        if (isset($this->tipMoney)) {
            $json['tip_money']                        = $this->tipMoney;
        }
        if (isset($this->totalMoney)) {
            $json['total_money']                      = $this->totalMoney;
        }
        if (isset($this->appFeeMoney)) {
            $json['app_fee_money']                    = $this->appFeeMoney;
        }
        if (isset($this->approvedMoney)) {
            $json['approved_money']                   = $this->approvedMoney;
        }
        if (isset($this->processingFee)) {
            $json['processing_fee']                   = $this->processingFee;
        }
        if (isset($this->refundedMoney)) {
            $json['refunded_money']                   = $this->refundedMoney;
        }
        if (isset($this->status)) {
            $json['status']                           = $this->status;
        }
        if (isset($this->delayDuration)) {
            $json['delay_duration']                   = $this->delayDuration;
        }
        if (isset($this->delayAction)) {
            $json['delay_action']                     = $this->delayAction;
        }
        if (isset($this->delayedUntil)) {
            $json['delayed_until']                    = $this->delayedUntil;
        }
        if (isset($this->sourceType)) {
            $json['source_type']                      = $this->sourceType;
        }
        if (isset($this->cardDetails)) {
            $json['card_details']                     = $this->cardDetails;
        }
        if (isset($this->cashDetails)) {
            $json['cash_details']                     = $this->cashDetails;
        }
        if (isset($this->bankAccountDetails)) {
            $json['bank_account_details']             = $this->bankAccountDetails;
        }
        if (isset($this->externalDetails)) {
            $json['external_details']                 = $this->externalDetails;
        }
        if (isset($this->walletDetails)) {
            $json['wallet_details']                   = $this->walletDetails;
        }
        if (isset($this->locationId)) {
            $json['location_id']                      = $this->locationId;
        }
        if (isset($this->orderId)) {
            $json['order_id']                         = $this->orderId;
        }
        if (isset($this->referenceId)) {
            $json['reference_id']                     = $this->referenceId;
        }
        if (isset($this->customerId)) {
            $json['customer_id']                      = $this->customerId;
        }
        if (isset($this->employeeId)) {
            $json['employee_id']                      = $this->employeeId;
        }
        if (isset($this->refundIds)) {
            $json['refund_ids']                       = $this->refundIds;
        }
        if (isset($this->riskEvaluation)) {
            $json['risk_evaluation']                  = $this->riskEvaluation;
        }
        if (isset($this->buyerEmailAddress)) {
            $json['buyer_email_address']              = $this->buyerEmailAddress;
        }
        if (isset($this->billingAddress)) {
            $json['billing_address']                  = $this->billingAddress;
        }
        if (isset($this->shippingAddress)) {
            $json['shipping_address']                 = $this->shippingAddress;
        }
        if (isset($this->note)) {
            $json['note']                             = $this->note;
        }
        if (isset($this->statementDescriptionIdentifier)) {
            $json['statement_description_identifier'] = $this->statementDescriptionIdentifier;
        }
        if (isset($this->capabilities)) {
            $json['capabilities']                     = $this->capabilities;
        }
        if (isset($this->receiptNumber)) {
            $json['receipt_number']                   = $this->receiptNumber;
        }
        if (isset($this->receiptUrl)) {
            $json['receipt_url']                      = $this->receiptUrl;
        }
        if (isset($this->versionToken)) {
            $json['version_token']                    = $this->versionToken;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
