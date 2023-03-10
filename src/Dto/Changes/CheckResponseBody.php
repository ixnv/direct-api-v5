<?php

namespace eLama\DirectApiV5\Dto\Changes;

use eLama\DirectApiV5\Dto\General\ResponseBody;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("property")
 * @method CheckResult getResult()
 */
class CheckResponseBody extends ResponseBody
{
    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Changes\CheckResult")
     *
     * @var CheckResult
     */
    protected $result;
}
