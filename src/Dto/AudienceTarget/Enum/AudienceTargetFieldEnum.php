<?php

namespace eLama\DirectApiV5\Dto\AudienceTarget\Enum;

use eLama\DirectApiV5\Dto\General\Enum\BaseEnum;

class AudienceTargetFieldEnum extends BaseEnum
{
    const __default = 'Id';

    const ID = 'Id';
    const AD_GROUP_ID = 'AdGroupId';
    const CAMPAIGN_ID = 'CampaignId';
    const RETARGETING_LIST_ID = 'RetargetingListId';
    const INTEREST_ID = 'InterestId';
    const CONTEXT_BID = 'ContextBid';
    const STRATEGY_PRIORITY = 'StrategyPriority';
    const STATE = 'State';
}
