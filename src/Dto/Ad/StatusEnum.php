<?php

namespace eLama\DirectApiV5\Dto\Ad;

use JMS\Serializer\Annotation as JMS;

class StatusEnum
{
    const __default = 'ACCEPTED';
    const ACCEPTED = 'ACCEPTED';
    const DRAFT = 'DRAFT';
    const MODERATION = 'MODERATION';
    const PREACCEPTED = 'PREACCEPTED';
    const REJECTED = 'REJECTED';
    const UNKNOWN = 'UNKNOWN';


}
