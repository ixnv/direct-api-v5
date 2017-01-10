<?php

namespace eLama\DirectApiV5\Dto\Ad\Enum;

use eLama\DirectApiV5\Dto\General\Enum\BaseEnum;

final class AdTypeEnum extends BaseEnum
{
    const __DEFAULT = 'TEXT_AD';

    const TEXT_AD = 'TEXT_AD';
    const MOBILE_APP_AD = 'MOBILE_APP_AD';
    const DYNAMIC_TEXT_AD = 'DYNAMIC_TEXT_AD';
    const IMAGE_AD = 'IMAGE_AD';
}
