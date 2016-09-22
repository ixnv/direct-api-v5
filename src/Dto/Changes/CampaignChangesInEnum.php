<?php

namespace eLama\DirectApiV5\Dto\Changes;

use eLama\DirectApiV5\Dto\Changes\Enum\CampaignChangesInEnum as CampaignChangesInEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        CampaignChangesInEnum::class,
        CampaignChangesInEnumBase::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */

class CampaignChangesInEnum extends CampaignChangesInEnumBase {}
