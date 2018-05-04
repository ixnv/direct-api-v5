<?php

namespace eLama\DirectApiV5\Dto\KeywordBids;

use eLama\DirectApiV5\Dto\General\ResponseBody;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("property")
 * @method GetResult getResult()
 */
class GetResponseBody extends ResponseBody
{
    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\KeywordBids\GetResult")
     *
     * @var GetResult
     */
    protected $result;
}
