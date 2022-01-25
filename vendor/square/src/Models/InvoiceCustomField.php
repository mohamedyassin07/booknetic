<?php



namespace Square\Models;

/**
 * An additional seller-defined and customer-facing field to include on the invoice. For more
 * information,
 * see [Custom fields](https://developer.squareup.com/docs/invoices-api/overview#custom-fields).
 */
class InvoiceCustomField implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $label;

    /**
     * @var string|null
     */
    private $value;

    /**
     * @var string|null
     */
    private $placement;

    /**
     * Returns Label.
     *
     * The label or title of the custom field. This field is required for a custom field.
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Sets Label.
     *
     * The label or title of the custom field. This field is required for a custom field.
     *
     * @maps label
     */
    public function setLabel($label = null)
    {
        $this->label = $label;
    }

    /**
     * Returns Value.
     *
     * The text of the custom field. If omitted, only the label is rendered.
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Sets Value.
     *
     * The text of the custom field. If omitted, only the label is rendered.
     *
     * @maps value
     */
    public function setValue($value = null)
    {
        $this->value = $value;
    }

    /**
     * Returns Placement.
     *
     * Indicates where to render a custom field on the Square-hosted invoice page and in emailed or PDF
     * copies of the invoice.
     */
    public function getPlacement()
    {
        return $this->placement;
    }

    /**
     * Sets Placement.
     *
     * Indicates where to render a custom field on the Square-hosted invoice page and in emailed or PDF
     * copies of the invoice.
     *
     * @maps placement
     */
    public function setPlacement($placement = null)
    {
        $this->placement = $placement;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->label)) {
            $json['label']     = $this->label;
        }
        if (isset($this->value)) {
            $json['value']     = $this->value;
        }
        if (isset($this->placement)) {
            $json['placement'] = $this->placement;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
