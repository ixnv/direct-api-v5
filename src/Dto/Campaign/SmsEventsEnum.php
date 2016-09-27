<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use eLama\DirectApiV5\Dto\Campaign\Enum\SmsEventsEnum as SmsEventsEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        SmsEventsEnum::class,
        SmsEventsEnumBase::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */

class SmsEventsEnum extends SmsEventsEnumBase {}
