<?php

namespace eLama\DirectApiV5\Dto\AdExtensions;

use eLama\DirectApiV5\Dto\General\BaseEnum;
use JMS\Serializer\Annotation as JMS;

class CalloutFieldEnum extends BaseEnum
{
    const __default = 'CalloutText';
    const CalloutText = 'CalloutText';
}
