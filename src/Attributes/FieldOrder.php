<?php

namespace Edd\PearLeafOrm\Attributes;

use Attribute;

/**
 * Specifies the order of a field.
 */
#[Attribute(Attribute::TARGET_PROPERTY)]
class FieldOrder
{
    public function __construct(
        public int $order
    ) {
    }
}