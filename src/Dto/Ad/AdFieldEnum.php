<?php

namespace eLama\DirectApiV5\Dto\Ad;

use eLama\DirectApiV5\Dto\General\BaseEnum;
use JMS\Serializer\Annotation as JMS;

class AdFieldEnum extends BaseEnum
{
    const __default = 'AdCategories';
    const AdCategories = 'AdCategories';
    const AgeLabel = 'AgeLabel';
    const AdGroupId = 'AdGroupId';
    const CampaignId = 'CampaignId';
    const Id = 'Id';
    const State = 'State';
    const Status = 'Status';
    const StatusClarification = 'StatusClarification';
    const Type = 'Type';
}
