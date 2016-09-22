<?php

namespace eLama\DirectApiV5\Dto\Campaign\Enum;

use eLama\DirectApiV5\Dto\General\Enum\BaseEnum;

class CampaignStatusEnum extends BaseEnum
{
    const __default = 'ACCEPTED';

    const ACCEPTED = 'ACCEPTED';
    const DRAFT = 'DRAFT';
    const MODERATION = 'MODERATION';
    const REJECTED = 'REJECTED';
}
