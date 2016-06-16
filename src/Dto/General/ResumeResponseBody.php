<?php

namespace eLama\DirectApiV5\Dto\General;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("property")
 * @method ResumeResult getResult()
 */
class ResumeResponseBody extends ResponseBody
{
    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\General\ResumeResult")
     *
     * @var ResumeResult
     */
    protected $result;
}
