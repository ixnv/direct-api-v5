<?php

namespace eLama\DirectApiV5\Dto\General;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
abstract class ResponseBody
{
    protected $result;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\General\Error")
     *
     * @var Error
     */
    protected $error;

    /**
     * @return mixed
     * @throws \Exception
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param mixed $result
     */
    public function setResult($result)
    {
        $this->result = $result;
    }

    /**
     * @param Error $error
     * @throws \Exception
     */
    public function setError(Error $error)
    {
        $this->error = $error;
    }

    public function getError()
    {
        return $this->error;
    }
}
