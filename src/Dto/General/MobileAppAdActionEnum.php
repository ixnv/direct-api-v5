<?php

namespace eLama\DirectApiV5\Dto\General;

use eLama\DirectApiV5\Dto\General\Enum\MobileAppAdActionEnum as MobileAppAdActionBaseEnum;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        MobileAppAdActionEnum::class,
        MobileAppAdActionBaseEnum::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */

class MobileAppAdActionEnum extends MobileAppAdActionBaseEnum 
{
    const __default = 'DOWNLOAD';
    const DOWNLOAD = 'DOWNLOAD';
}
