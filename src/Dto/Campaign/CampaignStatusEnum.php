<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use eLama\DirectApiV5\Dto\General\BaseEnum;

class CampaignStatusEnum extends BaseEnum
{
    const __default = 'ACCEPTED';

    const ACCEPTED = 'ACCEPTED';
    const DRAFT = 'DRAFT';
    const MODERATION = 'MODERATION';
    const REJECTED = 'REJECTED';
}
