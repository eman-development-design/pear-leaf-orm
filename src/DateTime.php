<?php

namespace Edd\PearLeafOrm;

use MongoDB\BSON\UTCDateTime;

class DateTime
{
    public static function toDateTime(UTCDateTime $dateTime): \DateTime
    {
        return $dateTime->toDateTime();
    }
}