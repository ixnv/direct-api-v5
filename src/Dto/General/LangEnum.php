<?php

namespace eLama\DirectApiV5\Dto\General;

use JMS\Serializer\Annotation as JMS;
use eLama\DirectApiV5\Dto\General\Enum\LangEnum as LangBaseEnum;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        LangEnum::class,
        LangBaseEnum::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */

class LangEnum extends LangBaseEnum {}
