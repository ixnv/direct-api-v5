<?php

namespace eLama\DirectApiV5\Dto\Bids\Enum;

use eLama\DirectApiV5\Dto\General\BaseEnum;
use JMS\Serializer\Annotation as JMS;

class CalculateByEnum extends BaseEnum
{
    const __default = 'VALUE';

    const VALUE = 'VALUE';
    const DIFF = 'DIFF';
}
