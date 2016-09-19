<?php

namespace eLama\DirectApiV5\Dto\AdGroup;

use eLama\DirectApiV5\Dto\General\BaseEnum;

class AdGroupFieldEnum extends BaseEnum
{
    const __default = 'Id';

    const Id = 'Id';
    const CampaignId = 'CampaignId';
    const Status = 'Status';
    const Name = 'Name';
    const RegionIds = 'RegionIds';
    const NegativeKeywords = 'NegativeKeywords';
    const Type = 'Type';
    const TrackingParams = 'TrackingParams';
}
