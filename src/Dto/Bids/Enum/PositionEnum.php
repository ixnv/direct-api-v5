<?php

namespace eLama\DirectApiV5\Dto\Bids\Enum;

use eLama\DirectApiV5\Dto\General\BaseEnum;
use JMS\Serializer\Annotation as JMS;

class PositionEnum extends BaseEnum
{
    const __default = 'PREMIUMFIRST';

    const PREMIUMFIRST = 'PREMIUMFIRST';
    const PREMIUMBLOCK = 'PREMIUMBLOCK';
    const FOOTERFIRST = 'FOOTERFIRST';
    const FOOTERBLOCK = 'FOOTERBLOCK';
    const P11 = 'P11';
    const P12 = 'P12';
    const P13 = 'P13';
    const P21 = 'P21';
    const P22 = 'P22';
    const P23 = 'P23';
    const P24 = 'P24';
}
