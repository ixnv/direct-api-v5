<?php

namespace eLama\DirectApiV5\Dto\General\Enum;

class StatusEnum extends BaseEnum
{
    const __default = 'ACCEPTED';

    const ACCEPTED = 'ACCEPTED';
    const DRAFT = 'DRAFT';
    const MODERATION = 'MODERATION';
    const PREACCEPTED = 'PREACCEPTED';
    const REJECTED = 'REJECTED';
    const UNKNOWN = 'UNKNOWN';
}
