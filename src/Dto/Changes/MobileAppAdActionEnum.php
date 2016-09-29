<?php

namespace eLama\DirectApiV5\Dto\Changes;

use eLama\DirectApiV5\Dto\General\MobileAppAdActionEnum as MobileAppAdActionEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        MobileAppAdActionEnum::class,
        MobileAppAdActionEnumBase::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */
class MobileAppAdActionEnum extends MobileAppAdActionEnumBase {}
