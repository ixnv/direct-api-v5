<?php


namespace eLama\DirectApiV5\Dto\Keyword;

use eLama\DirectApiV5\Dto\General\ResponseBody;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("property")
 * @method GetResult getResult()
 */
class GetResponseBody extends ResponseBody
{
    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Keyword\GetResult")
     *
     * @var GetResult
     */
    protected $result;
}
