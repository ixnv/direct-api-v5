<?php

namespace eLama\DirectApiV5\Dto\General;

use JMS\Serializer\Annotation as JMS;
use eLama\DirectApiV5\Dto\General\Enum\ScopeEnum as ScopeBaseEnum;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        ScopeEnum::class,
        ScopeBaseEnum::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */

class ScopeEnum extends ScopeBaseEnum {}
