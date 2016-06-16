<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use eLama\DirectApiV5\Dto\General\ResponseBody;
use eLama\DirectApiV5\Dto\General\SuspendResult;
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
