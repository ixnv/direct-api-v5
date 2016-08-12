<?php

namespace eLama\DirectApiV5\Dto\AdExtensions;

use eLama\DirectApiV5\Dto\General\BaseEnum;
use JMS\Serializer\Annotation as JMS;

class ExtensionStatusSelectionEnum extends BaseEnum
{
    const __default = 'DRAFT';
    const DRAFT = 'DRAFT';
    const MODERATION = 'MODERATION';
    const ACCEPTED = 'ACCEPTED';
    const REJECTED = 'REJECTED';
}
