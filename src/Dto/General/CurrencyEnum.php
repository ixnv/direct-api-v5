<?php

namespace eLama\DirectApiV5\Dto\General;

use eLama\DirectApiV5\Dto\General\Enum\CurrencyEnum as CurrencyBaseEnum;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        CurrencyEnum::class,
        CurrencyBaseEnum::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */

class CurrencyEnum extends CurrencyBaseEnum {}
