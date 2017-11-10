<?php

namespace eLama\DirectApiV5\Dto\AgencyClient;

use eLama\DirectApiV5\Dto\General\ResponseBody;
use JMS\Serializer\Annotation as JMS;

class AddResponseBody extends ResponseBody
{
    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\AgencyClient\AddResult")
     *
     * @var AddResult $Login
     */
    protected $result;

    /**
     * @return AddResult
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param AddResult $result
     */
    public function setResult($result)
    {
        $this->result = $result;
    }
}
