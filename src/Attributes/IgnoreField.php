<?php

namespace Edd\PearLeafOrm\Attributes;

use Attribute;

/**
 * Specifies the field should not be serialized.
 */
#[Attribute(Attribute::TARGET_PROPERTY)]
class IgnoreField
{
}