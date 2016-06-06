<?php

namespace eLama\DirectApiV5\Dto\Changes;

use eLama\DirectApiV5\Dto\General\ResponseBody;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("property")
 * @method CheckResponse getResult()
 */
class CheckResponseBody extends ResponseBody
{
    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Changes\CheckResponse")
     *
     * @var CheckResponse
     */
    protected $result;
}
