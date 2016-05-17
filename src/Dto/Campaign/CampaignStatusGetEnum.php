<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use JMS\Serializer\Annotation as JMS;

class CampaignStatusGetEnum
{
    const __default = 'ACCEPTED';
    const ACCEPTED = 'ACCEPTED';
    const DRAFT = 'DRAFT';
    const MODERATION = 'MODERATION';
    const REJECTED = 'REJECTED';
    const UNKNOWN = 'UNKNOWN';


}
