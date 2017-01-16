<?php

namespace eLama\DirectApiV5\Dto\Ad\Enum;

use eLama\DirectApiV5\Dto\General\Enum\BaseEnum;

final class AdFieldEnum extends BaseEnum
{
    const __DEFAULT = 'AdCategories';

    const AD_CATEGORIES = 'AdCategories';
    const AGE_LABEL = 'AgeLabel';
    const AD_GROUP_ID = 'AdGroupId';
    const CAMPAIGN_ID = 'CampaignId';
    const ID = 'Id';
    const STATE = 'State';
    const STATUS = 'Status';
    const STATUS_CLARIFICATION = 'StatusClarification';
    const TYPE = 'Type';
    const SUBTYPE = 'Subtype';
}
