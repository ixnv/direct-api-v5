<?php

namespace eLama\DirectApiV5\Dto\Changes;

use eLama\DirectApiV5\Dto\General\BaseEnum;

class CheckFieldEnum extends BaseEnum
{
    const __default = 'CampaignIds';

    const CampaignIds = 'CampaignIds';
    const AdGroupIds = 'AdGroupIds';
    const AdIds = 'AdIds';
    const CampaignsStat = 'CampaignsStat';
}
