<?php

namespace eLama\DirectApiV5\Dto\AdExtensions;

use eLama\DirectApiV5\Dto\General\ScopeEnum as ScopeEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        ScopeEnum::class,
        ScopeEnumBase::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */
class ScopeEnum extends ScopeEnumBase {}
