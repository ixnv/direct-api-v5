<?php

namespace eLama\DirectApiV5\Dto\Vcard;

use JMS\Serializer\Annotation as JMS;

class ScopeEnum
{
    const __default = 'SEARCH';
    const SEARCH = 'SEARCH';
    const NETWORK = 'NETWORK';
}
