<?php

namespace Edd\PearLeafOrm\Attributes;

use Attribute;

/**
 * Specifies that this is the Id field.
 */
#[Attribute(Attribute::TARGET_PROPERTY)]
class IdentifierField
{
}