<?php

namespace eLama\DirectApiV5\Dto\AdGroup;

use eLama\DirectApiV5\Dto\General\BaseEnum;
use JMS\Serializer\Annotation as JMS;

class TargetCarrierEnum extends BaseEnum
{
    const __default = 'WI_FI_ONLY';
    const WI_FI_ONLY = 'WI_FI_ONLY';
    const WI_FI_AND_CELLULAR = 'WI_FI_AND_CELLULAR';


}
