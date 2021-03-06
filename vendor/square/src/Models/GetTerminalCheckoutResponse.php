<?php



namespace Square\Models;

class GetTerminalCheckoutResponse implements \JsonSerializable
{
    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * @var TerminalCheckout|null
     */
    private $checkout;

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
     * Returns Checkout.
     */
    public function getCheckout()
    {
        return $this->checkout;
    }

    /**
     * Sets Checkout.
     *
     * @maps checkout
     */
    public function setCheckout(TerminalCheckout $checkout = null)
    {
        $this->checkout = $checkout;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->errors)) {
            $json['errors']   = $this->errors;
        }
        if (isset($this->checkout)) {
            $json['checkout'] = $this->checkout;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
