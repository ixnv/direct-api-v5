<?php

namespace eLama\DirectApiV5\Dto\General;

use eLama\DirectApiV5\Dto\Campaign\UnarchiveResponse;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("property")
 * @method UnarchiveResponse getResult()
 */
class UnarchiveResponseBody extends ResponseBody
{
    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\UnarchiveResponse")
     *
     * @var UnarchiveResponse
     */
    protected $result;
}
