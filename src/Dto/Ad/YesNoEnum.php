<?php

namespace eLama\DirectApiV5\Dto\Ad;

use JMS\Serializer\Annotation as JMS;

//@todo возможно он должен быть один на всех, в папе general
class YesNoEnum
{
    const __default = 'YES';
    const YES = 'YES';
    const NO = 'NO';
}
