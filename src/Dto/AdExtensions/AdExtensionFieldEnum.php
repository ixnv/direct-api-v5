<?php

namespace eLama\DirectApiV5\Dto\AdExtensions;

use eLama\DirectApiV5\Dto\General\BaseEnum;
use JMS\Serializer\Annotation as JMS;

class AdExtensionFieldEnum extends BaseEnum
{
    const __default = 'Id';
    const Id = 'Id';
    const Type = 'Type';
    const State = 'State';
    const Status = 'Status';
    const StatusClarification = 'StatusClarification';
    const Associated = 'Associated';
}
