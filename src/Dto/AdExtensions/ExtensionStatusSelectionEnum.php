<?php

namespace eLama\DirectApiV5\Dto\AdExtensions;

use JMS\Serializer\Annotation as JMS;

class ExtensionStatusSelectionEnum
{
    const __default = 'DRAFT';
    const DRAFT = 'DRAFT';
    const MODERATION = 'MODERATION';
    const ACCEPTED = 'ACCEPTED';
    const REJECTED = 'REJECTED';


}
