<?php

namespace eLama\DirectApiV5\Dto\Ad;

use eLama\DirectApiV5\Dto\General\BaseEnum;
use JMS\Serializer\Annotation as JMS;

class TextAdFieldEnum extends BaseEnum
{
    const __default = 'AdImageHash';
    const AdImageHash = 'AdImageHash';
    const DisplayDomain = 'DisplayDomain';
    const DisplayUrlPath = 'DisplayUrlPath';
    const Href = 'Href';
    const SitelinkSetId = 'SitelinkSetId';
    const Text = 'Text';
    const Title = 'Title';
    const Mobile = 'Mobile';
    const VCardId = 'VCardId';
    const AdImageModeration = 'AdImageModeration';
    const SitelinksModeration = 'SitelinksModeration';
    const VCardModeration = 'VCardModeration';
}
