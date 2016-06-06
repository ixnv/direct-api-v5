<?php


namespace eLama\DirectApiV5\Dto\Keyword;

use eLama\DirectApiV5\Dto\General\GetResponseGeneral;
use eLama\DirectApiV5\Dto\General\ResponseBody;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("property")
 * @method GetResponseGeneral getResult()
 */
class GetResponseBody extends ResponseBody
{
    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Keyword\GetResult")
     *
     * @var GetResponseGeneral
     */
    protected $result;
}
