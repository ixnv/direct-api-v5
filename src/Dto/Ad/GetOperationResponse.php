<?php


namespace eLama\DirectApiV5\Dto\Ad;

use eLama\DirectApiV5\Dto\General\OperationResponse;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("property")
 * @method GetResponseGeneral getResult()
 */
class GetOperationResponse extends OperationResponse
{
    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Ad\GetResponse")
     *
     * @var GetResponseGeneral
     */
    protected $result;
}
