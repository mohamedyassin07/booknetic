<?php



namespace Square\Models;

/**
 * A filter based on order `source` information.
 */
class SearchOrdersSourceFilter implements \JsonSerializable
{
    /**
     * @var string[]|null
     */
    private $sourceNames;

    /**
     * Returns Source Names.
     *
     * Filters by the [Source]($m/OrderSource) `name`. The filter returns any orders
     * with a `source.name` that matches any of the listed source names.
     *
     * Max: 10 source names.
     *
     * @return string[]|null
     */
    public function getSourceNames()
    {
        return $this->sourceNames;
    }

    /**
     * Sets Source Names.
     *
     * Filters by the [Source]($m/OrderSource) `name`. The filter returns any orders
     * with a `source.name` that matches any of the listed source names.
     *
     * Max: 10 source names.
     *
     * @maps source_names
     *
     * @param string[]|null $sourceNames
     */
    public function setSourceNames(array $sourceNames = null)
    {
        $this->sourceNames = $sourceNames;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->sourceNames)) {
            $json['source_names'] = $this->sourceNames;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
