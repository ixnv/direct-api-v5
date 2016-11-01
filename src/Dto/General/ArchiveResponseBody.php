<?php

namespace eLama\DirectApiV5\Dto\General;

use eLama\DirectApiV5\Dto\Campaign\ArchiveResponse;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("property")
 * @method ArchiveResponse getResult()
 */
class ArchiveResponseBody extends ResponseBody
{
    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\ArchiveResponse")
     *
     * @var ArchiveResponse
     */
    protected $result;
}
