<?php

namespace eLama\DirectApiV5\Dto\Keyword;

use eLama\DirectApiV5\Dto\General\YesNoUnknownEnum as YesNoUnknownEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        YesNoUnknownEnum::class,
        YesNoUnknownEnumBase::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */
class YesNoUnknownEnum extends YesNoUnknownEnumBase {}
