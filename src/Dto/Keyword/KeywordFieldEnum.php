<?php

namespace eLama\DirectApiV5\Dto\Keyword;

use eLama\DirectApiV5\Dto\General\BaseEnum;
use JMS\Serializer\Annotation as JMS;

class KeywordFieldEnum extends BaseEnum
{
    const __default = 'Id';
    const Id = 'Id';
    const Keyword = 'Keyword';
    const State = 'State';
    const Status = 'Status';
    const AdGroupId = 'AdGroupId';
    const CampaignId = 'CampaignId';
    const Bid = 'Bid';
    const ContextBid = 'ContextBid';
    const StrategyPriority = 'StrategyPriority';
    const UserParam1 = 'UserParam1';
    const UserParam2 = 'UserParam2';
    const Productivity = 'Productivity';
    const StatisticsSearch = 'StatisticsSearch';
    const StatisticsNetwork = 'StatisticsNetwork';


}
