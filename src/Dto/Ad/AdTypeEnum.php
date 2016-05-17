<?php

namespace eLama\DirectApiV5\Dto\Ad;

use eLama\DirectApiV5\Dto\General\BaseEnum;
use JMS\Serializer\Annotation as JMS;

class AdTypeEnum extends BaseEnum
{
    const __default = 'TEXT_AD';
    const TEXT_AD = 'TEXT_AD';
    const MOBILE_APP_AD = 'MOBILE_APP_AD';
    const DYNAMIC_TEXT_AD = 'DYNAMIC_TEXT_AD';
}
