<?php

namespace eLama\DirectApiV5\Dto\Changes;

use eLama\DirectApiV5\Dto\General\OperationEnum as OperationEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        OperationEnum::class,
        OperationEnumBase::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */
class OperationEnum extends OperationEnumBase {}
