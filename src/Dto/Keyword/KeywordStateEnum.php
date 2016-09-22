<?php

namespace eLama\DirectApiV5\Dto\Keyword;

use eLama\DirectApiV5\Dto\Keyword\Enum\KeywordStateEnum as KeywordStateEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        KeywordStateEnum::class,
        KeywordStateEnumBase::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */

class KeywordStateEnum extends KeywordStateEnumBase {}
