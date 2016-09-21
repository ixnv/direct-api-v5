<?php

namespace eLama\DirectApiV5\Dto\Changes;

use eLama\DirectApiV5\Dto\General\Enum\BaseEnum;

class CampaignChangesInEnum extends BaseEnum
{
    const __default = 'SELF';

    const SELF = 'SELF';
    const CHILDREN = 'CHILDREN';
    const STAT = 'STAT';
}
