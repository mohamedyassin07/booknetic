<?php



namespace Square\Models;

class PaymentOptions implements \JsonSerializable
{
    /**
     * @var bool|null
     */
    private $autocomplete;

    /**
     * Returns Autocomplete.
     *
     * Indicates whether the `Payment` objects created from this `TerminalCheckout` are automatically
     * `COMPLETED` or left in an `APPROVED` state for later modification.
     */
    public function getAutocomplete()
    {
        return $this->autocomplete;
    }

    /**
     * Sets Autocomplete.
     *
     * Indicates whether the `Payment` objects created from this `TerminalCheckout` are automatically
     * `COMPLETED` or left in an `APPROVED` state for later modification.
     *
     * @maps autocomplete
     */
    public function setAutocomplete($autocomplete = null)
    {
        $this->autocomplete = $autocomplete;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->autocomplete)) {
            $json['autocomplete'] = $this->autocomplete;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
