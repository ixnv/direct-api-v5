<?php

namespace eLama\DirectApiV5\Dto\Keyword;

use eLama\DirectApiV5\Dto\General\StatusSelectionEnum as StatusSelectionEnumBase;

trigger_error(
    sprintf('%s is deprecated use %s', StatusSelectionEnum::class, StatusSelectionEnumBase::class),
    E_USER_DEPRECATED
);

/**
 * @deprecated
 */
class StatusSelectionEnum extends StatusSelectionEnumBase {}
