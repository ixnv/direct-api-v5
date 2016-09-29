<?php

namespace eLama\DirectApiV5\Dto\General;

use eLama\DirectApiV5\Dto\General\Enum\CountryCodeEnum as CountryCodeBaseEnum;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        CountryCodeEnum::class,
        CountryCodeBaseEnum::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */

class CountryCodeEnum extends CountryCodeBaseEnum {}
