<?php

namespace eLama\DirectApiV5\Dto\AdGroup;

use eLama\DirectApiV5\Dto\General\BaseEnum;

class DomainUrlProcessingStatusEnum extends BaseEnum
{
    const __default = 'UNPROCESSED';

    const UNPROCESSED = 'UNPROCESSED';
    const PROCESSED = 'PROCESSED';
    const EMPTY_RESULT = 'EMPTY_RESULT';
}
