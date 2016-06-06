<?php


namespace eLama\DirectApiV5\Dto\Ad;

use eLama\DirectApiV5\Dto\General\ResponseBody;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("property")
 * @method GetResponseGeneral getResult()
 */
class GetResponseBody extends ResponseBody
{
    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Ad\GetResponse")
     *
     * @var GetResponseGeneral
     */
    protected $result;
}
