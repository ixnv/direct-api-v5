<?php

namespace eLama\DirectApiV5\Dto\AdGroup\Enum;

use eLama\DirectApiV5\Dto\General\Enum\BaseEnum;

class DomainUrlProcessingStatusEnum extends BaseEnum
{
    const __default = 'UNPROCESSED';

    const UNPROCESSED = 'UNPROCESSED';
    const PROCESSED = 'PROCESSED';
    const EMPTY_RESULT = 'EMPTY_RESULT';
}
