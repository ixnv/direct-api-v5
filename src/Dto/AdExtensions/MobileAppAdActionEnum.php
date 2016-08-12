<?php

namespace eLama\DirectApiV5\Dto\AdExtensions;

use eLama\DirectApiV5\Dto\General\BaseEnum;
use JMS\Serializer\Annotation as JMS;

class MobileAppAdActionEnum extends BaseEnum
{
    const __default = 'DOWNLOAD';
    const DOWNLOAD = 'DOWNLOAD';
}
