<?php

namespace eLama\DirectApiV5\Dto\AdGroup;

use JMS\Serializer\Annotation as JMS;

class DomainUrlProcessingStatusEnum
{
    const __default = 'UNPROCESSED';
    const UNPROCESSED = 'UNPROCESSED';
    const PROCESSED = 'PROCESSED';
    const EMPTY_RESULT = 'EMPTY_RESULT';


}
