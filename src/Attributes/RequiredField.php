<?php

namespace Edd\PearLeafOrm\Attributes;

use Attribute;

/**
 * Indicates that a field is required.
 */
#[Attribute(Attribute::TARGET_PROPERTY)]
class RequiredField
{
}