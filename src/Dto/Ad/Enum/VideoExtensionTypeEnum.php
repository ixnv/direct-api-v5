<?php

namespace eLama\DirectApiV5\Dto\Ad\Enum;

use eLama\DirectApiV5\Dto\General\Enum\BaseEnum;

class VideoExtensionTypeEnum extends BaseEnum
{
    const DRAFT = 'DRAFT';
    const MODERATION = 'MODERATION';
    const UNKNOWN = 'UNKNOWN';
    const ACCEPTED = 'ACCEPTED';
    const REJECTED = 'REJECTED';
}
