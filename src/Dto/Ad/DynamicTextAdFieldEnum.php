<?php

namespace eLama\DirectApiV5\Dto\Ad;

use eLama\DirectApiV5\Dto\General\BaseEnum;

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
