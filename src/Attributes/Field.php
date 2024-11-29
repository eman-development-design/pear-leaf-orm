<?php

namespace Edd\PearLeafOrm\Attributes;

use Attribute;
use Edd\PearLeafOrm\Constants\BsonType;

/**
 * Specifies details of a field.
 */
#[Attribute(Attribute::TARGET_PROPERTY)]
class Field
{
    public function __construct(
        public ?string $name = null,
        public BsonType $type = BsonType::STRING
    ) {
    }
}