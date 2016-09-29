<?php

namespace eLama\DirectApiV5\Dto\Vcard;

use eLama\DirectApiV5\Dto\Vcard\Enum\VCardFieldEnum as VCardFieldEnumBase;

trigger_error(
    sprintf(
        '%s is deprecated use %s',
        VCardFieldEnum::class,
        VCardFieldEnumBase::class
    ),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */

class VCardFieldEnum extends VCardFieldEnumBase {}
