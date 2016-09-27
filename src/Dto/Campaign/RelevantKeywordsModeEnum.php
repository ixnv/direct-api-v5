<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use eLama\DirectApiV5\Dto\Campaign\Enum\RelevantKeywordsModeEnum as RelevantKeywordsModeEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        RelevantKeywordsModeEnum::class,
        RelevantKeywordsModeEnumBase::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */

class RelevantKeywordsModeEnum extends RelevantKeywordsModeEnumBase {}
