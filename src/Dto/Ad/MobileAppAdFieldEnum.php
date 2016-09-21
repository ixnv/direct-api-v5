<?php

namespace eLama\DirectApiV5\Dto\Ad;

use eLama\DirectApiV5\Dto\General\Enum\BaseEnum;

class MobileAppAdFieldEnum extends BaseEnum
{
    const __default = 'Title';

    const Title = 'Title';
    const Text = 'Text';
    const Features = 'Features';
    const Action = 'Action';
    const TrackingUrl = 'TrackingUrl';
}
