<?php

namespace Edd\PearLeafOrm\Attributes;

use Attribute;
use Edd\PearLeafOrm\Constants\UuidRepresentationOption;

/**
 * Determines how to parse a UUID stored in a binary field.
 */
#[Attribute(Attribute::TARGET_PROPERTY)]
class UuidRepresentation
{
    public function __construct(
        public UuidRepresentationOption $option
    ) {
    }
}