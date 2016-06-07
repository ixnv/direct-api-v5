<?php

namespace eLama\DirectApiV5\Dto\Changes;

use eLama\DirectApiV5\Dto\General\ResponseBody;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("property")
 * @method CheckCampaignsResult getResult()
 */
class CheckCampaignsResponseBody extends ResponseBody
{
    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Changes\CheckCampaignsResult")
     *
     * @var CheckCampaignsResult
     */
    protected $result;

}
