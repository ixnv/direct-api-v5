<?php

namespace eLama\DirectApiV5\Dto\Keyword;

use eLama\DirectApiV5\Dto\Keyword\Enum\KeywordFieldEnum as KeywordFieldEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        KeywordFieldEnum::class,
        KeywordFieldEnumBase::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */

class KeywordFieldEnum extends KeywordFieldEnumBase {}
