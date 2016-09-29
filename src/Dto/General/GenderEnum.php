<?php

namespace eLama\DirectApiV5\Dto\General;

use eLama\DirectApiV5\Dto\General\Enum\GenderEnum as GenderEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        GenderEnum::class,
        GenderEnumBase::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */
class GenderEnum
{
    const __default = 'GENDER_MALE';
    
    const GENDER_MALE = 'GENDER_MALE';
    const GENDER_FEMALE = 'GENDER_FEMALE';
}
