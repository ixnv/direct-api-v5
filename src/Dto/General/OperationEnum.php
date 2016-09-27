<?php

namespace eLama\DirectApiV5\Dto\General;

use eLama\DirectApiV5\Dto\General\Enum\OperationEnum as OperationBaseEnum;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        OperationEnum::class,
        OperationBaseEnum::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */

class OperationEnum extends OperationBaseEnum {}
