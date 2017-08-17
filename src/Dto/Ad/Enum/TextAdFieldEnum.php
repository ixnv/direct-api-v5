<?php

namespace eLama\DirectApiV5\Dto\Ad\Enum;

use eLama\DirectApiV5\Dto\General\Enum\BaseEnum;

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
    const Title2 = 'Title2';
    const Mobile = 'Mobile';
    const VCardId = 'VCardId';
    const AdImageModeration = 'AdImageModeration';
    const SitelinksModeration = 'SitelinksModeration';
    const VCardModeration = 'VCardModeration';
    const AdExtensions = 'AdExtensions';
}
