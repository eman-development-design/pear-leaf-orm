<?php

namespace Edd\PearLeafOrm\Constants;

enum DateTimeKind: int
{
    case UNSPECIFIED = 0;
    case UTC = 1;
    case LOCALE = 2;
}
