<?php
namespace eLama\DirectApiV5\Dto\General;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("property")
 * @method AddResult getResult()
 */
class AddResponseBody extends ResponseBody
{
    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\General\AddResult")
     *
     * @var AddResult
     */
    protected $result;
}
