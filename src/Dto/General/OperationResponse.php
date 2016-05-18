<?php


namespace eLama\DirectApiV5\Dto\General;

use eLama\DirectApiV5\RequestResponse\GetResponseGeneral;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
abstract class OperationResponse
{
    protected $result;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\General\Error")
     *
     * @var Error
     */
    protected $error;

    /**
     * @return GetResponseGeneral
     * @throws \Exception
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * @param array $result
     */
    public function setResult(array $result)
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
