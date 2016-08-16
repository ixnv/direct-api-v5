<?php

namespace eLama\DirectApiV5\Dto\AdGroup;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class ExceptionNotification extends \eLama\DirectApiV5\Dto\General\ExceptionNotification
{
    /**
     * @deprecated
     * @see General\ExceptionNotification
     * @param int $Code
     * @param string $Message
     * @param string $Details
     */
    public function __construct($Code = null, $Message = null, $Details = null)
    {
        parent::__construct($Code, $Message, $Details);
    }
}
