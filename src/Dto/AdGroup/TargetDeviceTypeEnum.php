<?php

namespace eLama\DirectApiV5\Dto\AdGroup;

use eLama\DirectApiV5\Dto\General\Enum\BaseEnum;

class TargetDeviceTypeEnum extends BaseEnum
{
    const __default = 'DEVICE_TYPE_MOBILE';

    const DEVICE_TYPE_MOBILE = 'DEVICE_TYPE_MOBILE';
    const DEVICE_TYPE_TABLET = 'DEVICE_TYPE_TABLET';
}
