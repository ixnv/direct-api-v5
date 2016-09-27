<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use eLama\DirectApiV5\Dto\Campaign\Enum\CampaignTypeEnum as CampaignTypeEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        CampaignTypeEnum::class,
        CampaignTypeEnumBase::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */

class CampaignTypeEnum extends CampaignTypeEnumBase {}
