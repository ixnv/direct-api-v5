<?php

namespace eLama\DirectApiV5\Dto\Ad\Enum;

use eLama\DirectApiV5\Dto\General\Enum\BaseEnum;

class MobileAppFeatureEnum extends BaseEnum
{
    const __default = 'PRICE';

    const PRICE = 'PRICE';
    const ICON = 'ICON';
    const CUSTOMER_RATING = 'CUSTOMER_RATING';
    const RATINGS = 'RATINGS';
}
