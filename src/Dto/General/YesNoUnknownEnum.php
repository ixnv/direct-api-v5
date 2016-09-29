<?php

namespace eLama\DirectApiV5\Dto\General;

use eLama\DirectApiV5\Dto\General\Enum\YesNoUnknownEnum as YesNoUnknownBaseEnum;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        YesNoUnknownEnum::class,
        YesNoUnknownBaseEnum::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */

class YesNoUnknownEnum extends YesNoUnknownBaseEnum {}
