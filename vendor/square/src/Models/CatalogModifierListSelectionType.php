<?php



namespace Square\Models;

/**
 * Indicates whether a CatalogModifierList supports multiple selections.
 */
class CatalogModifierListSelectionType
{
    /**
     * Indicates that a CatalogModifierList allows only a
     * single CatalogModifier to be selected.
     */
    const SINGLE = 'SINGLE';

    /**
     * Indicates that a CatalogModifierList allows multiple
     * CatalogModifier to be selected.
     */
    const MULTIPLE = 'MULTIPLE';
}
