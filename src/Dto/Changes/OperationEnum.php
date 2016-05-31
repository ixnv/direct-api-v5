<?php

namespace eLama\DirectApiV5\Dto\Changes;

use JMS\Serializer\Annotation as JMS;

class OperationEnum
{
    const __default = 'ADD';
    const ADD = 'ADD';
    const REMOVE = 'REMOVE';
    const SET = 'SET';


}
