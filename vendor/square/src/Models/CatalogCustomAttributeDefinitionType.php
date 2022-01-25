<?php



namespace Square\Models;

/**
 * Defines the possible types for a custom attribute.
 */
class CatalogCustomAttributeDefinitionType
{
    /**
     * A free-form string containing up to 255 characters.
     */
    const STRING = 'STRING';

    /**
     * A `true` or `false` value.
     */
    const BOOLEAN = 'BOOLEAN';

    /**
     * A decimal string representation of a number. Can support up to 5 digits after the decimal point.
     */
    const NUMBER = 'NUMBER';

    /**
     * One or more choices from `allowed_selections`.
     */
    const SELECTION = 'SELECTION';
}
