<?php

namespace eLama\DirectApiV5\Dto\AdGroup\Enum;

use JMS\Serializer\Annotation as JMS;

class ServingStatusEnum
{
    const __default = 'ELIGIBLE';
    const ELIGIBLE = 'ELIGIBLE';
    const RARELY_SERVED = 'RARELY_SERVED';
}
