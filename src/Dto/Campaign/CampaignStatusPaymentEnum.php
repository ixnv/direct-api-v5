<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use eLama\DirectApiV5\Dto\Campaign\Enum\CampaignStatusPaymentEnum as CampaignStatusPaymentEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        CampaignStatusPaymentEnum::class,
        CampaignStatusPaymentEnumBase::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */

class CampaignStatusPaymentEnum extends CampaignStatusPaymentEnumBase {}
