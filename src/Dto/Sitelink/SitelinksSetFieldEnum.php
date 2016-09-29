<?php

namespace eLama\DirectApiV5\Dto\Sitelink;

use eLama\DirectApiV5\Dto\Sitelink\Enum\SitelinksSetFieldEnum as SitelinksSetFieldEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        SitelinksSetFieldEnum::class,
        SitelinksSetFieldEnumBase::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */

class SitelinksSetFieldEnum extends SitelinksSetFieldEnumBase {}
