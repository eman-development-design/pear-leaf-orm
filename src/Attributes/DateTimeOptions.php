<?php

namespace Edd\PearLeafOrm\Attributes;

use Attribute;
use Edd\PearLeafOrm\Constants\BsonType;
use Edd\PearLeafOrm\Constants\DateTimeKind;

/**
 * Specifies serialization options for a DateTime field.
 */
#[Attribute(Attribute::TARGET_PROPERTY)]
class DateTimeOptions
{
    public function __construct(
        public bool $dateOnly = false,
        public DateTimeKind $kind = DateTimeKind::UTC,
        public BsonType $representAs = BsonType::DATE
    ) {
    }
}