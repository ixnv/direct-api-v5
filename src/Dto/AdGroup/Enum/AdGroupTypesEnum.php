<?php

namespace eLama\DirectApiV5\Dto\AdGroup\Enum;

use eLama\DirectApiV5\Dto\General\Enum\BaseEnum;

class AdGroupTypesEnum extends BaseEnum
{
    const __default = 'TEXT_AD_GROUP';

    const TEXT_AD_GROUP = 'TEXT_AD_GROUP';
    const MOBILE_APP_AD_GROUP = 'MOBILE_APP_AD_GROUP';
    const DYNAMIC_TEXT_AD_GROUP = 'DYNAMIC_TEXT_AD_GROUP';
}
