<?php
namespace eLama\DirectApiV5\Dto\General;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("property")
 * @method DeleteResult getResult()
 */
class DeleteResponseBody extends ResponseBody
{
    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\General\DeleteResult")
     *
     * @var DeleteResult
     */
    protected $result;
}
