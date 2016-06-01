<?php

namespace eLama\DirectApiV5\Dto\Changes;

use eLama\DirectApiV5\Dto\General\OperationResponse;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("property")
 * @method CheckResponse getResult()
 */
class CheckOperationResponse extends OperationResponse
{
    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Changes\CheckResponse")
     *
     * @var CheckResponse
     */
    protected $result;
}
