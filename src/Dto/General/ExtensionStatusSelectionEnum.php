<?php

namespace eLama\DirectApiV5\Dto\General;

class ExtensionStatusSelectionEnum extends BaseEnum
{
    const __default = 'DRAFT';

    const DRAFT = 'DRAFT';
    const MODERATION = 'MODERATION';
    const ACCEPTED = 'ACCEPTED';
    const REJECTED = 'REJECTED';
}
