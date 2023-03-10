<?php

namespace eLama\DirectApiV5\Dto\AdGroup\Enum;

use eLama\DirectApiV5\Dto\General\Enum\BaseEnum;

class MobileAppAdGroupFieldEnum extends BaseEnum
{
    const __default = 'StoreUrl';

    const StoreUrl = 'StoreUrl';
    const TargetDeviceType = 'TargetDeviceType';
    const TargetCarrier = 'TargetCarrier';
    const TargetOperatingSystemVersion = 'TargetOperatingSystemVersion';
    const AppIconModeration = 'AppIconModeration';
    const AppAvailabilityStatus = 'AppAvailabilityStatus';
    const AppOperatingSystemType = 'AppOperatingSystemType';
}
