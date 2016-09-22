<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use eLama\DirectApiV5\Dto\Campaign\Enum\CampaignFundsEnum as CampaignFundsEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        CampaignFundsEnum::class,
        CampaignFundsEnumBase::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */

class CampaignFundsEnum extends CampaignFundsEnumBase {}
