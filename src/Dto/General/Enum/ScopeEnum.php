<?php

namespace eLama\DirectApiV5\Dto\General\Enum;

use JMS\Serializer\Annotation as JMS;

class ScopeEnum extends BaseEnum
{
    const __default = 'SEARCH';

    const SEARCH = 'SEARCH';
    const NETWORK = 'NETWORK';
}
