<?php

namespace eLama\DirectApiV5\Dto\KeywordBids\Enum;

use eLama\DirectApiV5\Dto\General\Enum\BaseEnum;

class ExtensionStatusSelectionEnum extends BaseEnum
{
    const __default = 'DRAFT';

    const DRAFT = 'DRAFT';
    const MODERATION = 'MODERATION';
    const ACCEPTED = 'ACCEPTED';
    const REJECTED = 'REJECTED';
}
