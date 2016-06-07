<?php
namespace eLama\DirectApiV5\Dto\General;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("property")
 * @method UpdateResult getResult()
 */
class UpdateResponseBody extends ResponseBody
{
    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\General\UpdateResult")
     *
     * @var UpdateResult
     */
    protected $result;
}
