<?php

namespace eLama\DirectApiV5\Dto\AdExtensions;

use eLama\DirectApiV5\Dto\General\BaseEnum;
use JMS\Serializer\Annotation as JMS;

class OperationEnum extends BaseEnum
{
    const __default = 'ADD';
    const ADD = 'ADD';
    const REMOVE = 'REMOVE';
    const SET = 'SET';
}
