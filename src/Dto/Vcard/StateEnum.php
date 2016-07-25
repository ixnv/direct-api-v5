<?php

namespace eLama\DirectApiV5\Dto\Vcard;

use JMS\Serializer\Annotation as JMS;

class StateEnum
{
    const __default = 'OFF';
    const OFF = 'OFF';
    const ON = 'ON';
    const SUSPENDED = 'SUSPENDED';
    const OFF_BY_MONITORING = 'OFF_BY_MONITORING';
    const ARCHIVED = 'ARCHIVED';
    const DELETED = 'DELETED';
    const UNKNOWN = 'UNKNOWN';
}
