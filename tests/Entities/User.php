<?php

namespace Tests\Entities;

use Edd\PearLeafOrm\Attributes\BinaryField;
use Edd\PearLeafOrm\Attributes\Document;
use Edd\PearLeafOrm\Attributes\Field;
use Edd\PearLeafOrm\Constants\BinaryDataType;

#[Document('Demo')]
class User
{
    #[BinaryField(BinaryDataType::UUID, 'UserGuid')]
    public string $userGuid;

    #[Field]
    public string $name;
}