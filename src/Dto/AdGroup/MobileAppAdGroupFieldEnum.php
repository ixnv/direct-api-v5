<?php

namespace eLama\DirectApiV5\Dto\AdGroup;

use eLama\DirectApiV5\Dto\General\BaseEnum;

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
