<?php


namespace eLama\DirectApiV5\Dto\AdGroup;

use eLama\DirectApiV5\Dto\General\OperationResponse;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("property")
 * @method GetResponse getResult()
 */
class GetOperationResponse extends OperationResponse
{
    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\AdGroup\GetResponse")
     *
     * @var GetResponse
     */
    protected $result;
}
