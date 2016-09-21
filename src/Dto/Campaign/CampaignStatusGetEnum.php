<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use eLama\DirectApiV5\Dto\General\Enum\BaseEnum;

class CampaignStatusGetEnum extends BaseEnum
{
    const __default = 'ACCEPTED';

    const ACCEPTED = 'ACCEPTED';
    const DRAFT = 'DRAFT';
    const MODERATION = 'MODERATION';
    const REJECTED = 'REJECTED';
    const UNKNOWN = 'UNKNOWN';
}
