<?php

namespace Edd\PearLeafOrm\Constants;

enum UuidRepresentationOption
{
    case UNSPECIFIED;
    case STANDARD;
    case CSHARP_LEGACY;
    case JAVA_LEGACY;
    case PYTHON_LEGACY;
}
