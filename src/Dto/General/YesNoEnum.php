<?php

namespace eLama\DirectApiV5\Dto\General;

use JMS\Serializer\Annotation as JMS;

class YesNoEnum extends BaseEnum
{
    const __default = 'YES';
    const YES = 'YES';
    const NO = 'NO';
}
