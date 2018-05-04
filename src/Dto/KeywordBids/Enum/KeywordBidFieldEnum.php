<?php

namespace eLama\DirectApiV5\Dto\KeywordBids\Enum;

use eLama\DirectApiV5\Dto\General\Enum\BaseEnum;

class KeywordBidFieldEnum extends BaseEnum
{
    const __default = 'KeywordId';

    const KeywordId = 'KeywordId';
    const AdGroupId = 'AdGroupId';
    const CampaignId = 'CampaignId';
    const ServingStatus = 'ServingStatus';
    const StrategyPriority = 'StrategyPriority';
}
