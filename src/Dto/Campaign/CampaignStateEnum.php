<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use JMS\Serializer\Annotation as JMS;

class CampaignStateEnum
{
    const __default = 'ARCHIVED';
    const ARCHIVED = 'ARCHIVED';
    const CONVERTED = 'CONVERTED';
    const ENDED = 'ENDED';
    const OFF = 'OFF';
    const ON = 'ON';
    const SUSPENDED = 'SUSPENDED';


}
