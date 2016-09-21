<?php

namespace eLama\DirectApiV5\Dto\General;

use eLama\DirectApiV5\Dto\General\Enum\StatusSelectionEnum as StatusSelectionBaseEnum;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        StatusSelectionEnum::class,
        StatusSelectionBaseEnum::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */

class StatusSelectionEnum extends StatusSelectionBaseEnum {}
