<?php

namespace Edd\PearLeafOrm\Attributes;

use Attribute;

/**
 * Specifies the field should not be serialized, if the value is the default value of the set type.
 */
#[Attribute(Attribute::TARGET_PROPERTY)]
class IgnoreIfDefault
{
}