<?php


namespace eLama\DirectApiV5\Dto\Keyword;

use eLama\DirectApiV5\Dto\General\GetResponseGeneral;
use eLama\DirectApiV5\Dto\General\OperationResponse;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("property")
 * @method GetResponseGeneral getResult()
 */
class GetOperationResponse extends OperationResponse
{
    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Keyword\GetResponse")
     *
     * @var GetResponseGeneral
     */
    protected $result;
}
