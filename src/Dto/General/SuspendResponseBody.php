<?php

namespace eLama\DirectApiV5\Dto\General;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("property")
 * @method SuspendResult getResult()
 */
class SuspendResponseBody extends ResponseBody
{
    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\General\SuspendResult")
     *
     * @var SuspendResult
     */
    protected $result;
}
