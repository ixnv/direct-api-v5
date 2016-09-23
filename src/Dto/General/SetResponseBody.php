<?php

namespace eLama\DirectApiV5\Dto\General;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("property")
 * @method SetResult getResult()
 */
class SetResponseBody extends ResponseBody
{
    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\General\SetResult")
     *
     * @var SetResult
     */
    protected $result;
}
