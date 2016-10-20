<?php

namespace eLama\DirectApiV5\Dto\Ad\Enum;

use eLama\DirectApiV5\Dto\General\Enum\BaseEnum;

class AdStatusEnum extends BaseEnum
{
    const DRAFT = 'DRAFT';
    const MODERATION = 'MODERATION';
    const PREACCEPTED = 'PREACCEPTED';
    const ACCEPTED = 'ACCEPTED';
    const REJECTED = 'REJECTED';
}
