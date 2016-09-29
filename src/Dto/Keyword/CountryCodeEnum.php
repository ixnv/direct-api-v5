<?php

namespace eLama\DirectApiV5\Dto\Keyword;

use eLama\DirectApiV5\Dto\General\CountryCodeEnum as CountryCodeEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        CountryCodeEnum::class,
        CountryCodeEnumBase::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */
class CountryCodeEnum extends CountryCodeEnumBase {}

