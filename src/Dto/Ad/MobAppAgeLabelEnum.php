<?php

namespace eLama\DirectApiV5\Dto\Ad;

use eLama\DirectApiV5\Dto\Ad\Enum\MobAppAgeLabelEnum as MobAppAgeLabelEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        MobAppAgeLabelEnum::class,
        MobAppAgeLabelEnumBase::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */

class MobAppAgeLabelEnum extends MobAppAgeLabelEnumBase {}
