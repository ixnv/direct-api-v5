<?php

namespace eLama\DirectApiV5\Dto\Ad;

use eLama\DirectApiV5\Dto\General\CurrencyEnum as CurrencyEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        CurrencyEnum::class,
        CurrencyEnumBase::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */
class CurrencyEnum extends CurrencyEnumBase {}
