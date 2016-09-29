<?php

namespace eLama\DirectApiV5\Dto\Ad\Enum;

use eLama\DirectApiV5\Dto\General\Enum\BaseEnum;

class DynamicTextAdFieldEnum extends BaseEnum
{
    const __default = 'AdImageHash';

    const AdImageHash = 'AdImageHash';
    const SitelinkSetId = 'SitelinkSetId';
    const Text = 'Text';
    const VCardId = 'VCardId';
    const AdImageModeration = 'AdImageModeration';
    const SitelinksModeration = 'SitelinksModeration';
    const VCardModeration = 'VCardModeration';
}
