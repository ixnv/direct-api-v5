<?php

namespace eLama\DirectApiV5\Dto\Vcard;

use JMS\Serializer\Annotation as JMS;
use eLama\DirectApiV5\Dto\General\ResponseBody;


/**
 * @JMS\AccessType("property")
 * @method GetResult getResult()
 */
class GetResponseBody extends ResponseBody
{
    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Vcard\GetResult")
     *
     * @var GetResult
     */
    protected $result;
}
