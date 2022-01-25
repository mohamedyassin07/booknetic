<?php



namespace Square\Models;

/**
 * Describes a `CancelInvoice` request.
 */
class CancelInvoiceRequest implements \JsonSerializable
{
    /**
     * @var int
     */
    private $version;

    /**
     * @param $version
     */
    public function __construct($version)
    {
        $this->version = $version;
    }

    /**
     * Returns Version.
     *
     * The version of the [invoice]($m/Invoice) to cancel.
     * If you do not know the version, you can call
     * [GetInvoice]($e/Invoices/GetInvoice) or [ListInvoices]($e/Invoices/ListInvoices).
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Sets Version.
     *
     * The version of the [invoice]($m/Invoice) to cancel.
     * If you do not know the version, you can call
     * [GetInvoice]($e/Invoices/GetInvoice) or [ListInvoices]($e/Invoices/ListInvoices).
     *
     * @required
     * @maps version
     */
    public function setVersion($version)
    {
        $this->version = $version;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['version'] = $this->version;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
