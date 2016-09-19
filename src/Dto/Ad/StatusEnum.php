<?php

namespace eLama\DirectApiV5\Dto\Ad;

use eLama\DirectApiV5\Dto\General\StatusEnum as StatusEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        StatusEnum::class,
        StatusEnumBase::class
    ),
    E_USER_DEPRECATED
);

class StatusEnum extends StatusEnumBase {}
