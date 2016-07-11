<?php

namespace eLama\DirectApiV5\Dto\Sitelink;

use eLama\DirectApiV5\Dto\General\BaseEnum;
use JMS\Serializer\Annotation as JMS;

class SitelinksSetFieldEnum extends BaseEnum
{
    const __default = 'Id';
    const Id = 'Id';
    const Sitelinks = 'Sitelinks';
}
