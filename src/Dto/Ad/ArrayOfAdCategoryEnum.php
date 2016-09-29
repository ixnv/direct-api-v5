<?php

namespace eLama\DirectApiV5\Dto\Ad;

use JMS\Serializer\Annotation as JMS;
use eLama\DirectApiV5\Dto\Ad\Enum\ArrayOfAdCategoryEnum as ArrayOfAdCategoryEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        ArrayOfAdCategoryEnum::class,
        ArrayOfAdCategoryEnumBase::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 * @JMS\AccessType("public_method")
 */
class ArrayOfAdCategoryEnum extends ArrayOfAdCategoryEnumBase {}
