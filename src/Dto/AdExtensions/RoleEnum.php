<?php

namespace eLama\DirectApiV5\Dto\AdExtensions;

use JMS\Serializer\Annotation as JMS;

class RoleEnum
{
    const __default = 'CHIEF';
    const CHIEF = 'CHIEF';
    const DELEGATE = 'DELEGATE';
    const CLIENT = 'CLIENT';
    const AGENCY = 'AGENCY';
    const MANAGER = 'MANAGER';
    const UNKNOWN = 'UNKNOWN';


}
