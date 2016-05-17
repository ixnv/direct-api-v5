<?php

namespace eLama\DirectApiV5\RequestResponse;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
abstract class GeneralRequest
{
    /**
     * @return string
     */
    abstract public function resource();

    /**
     * @return string
     */
    abstract public function resultClass();

    /**
     * @return array
     */
    public function getBody()
    {
        return [
            'method' => $this->method(),
            'params' => $this->params()
        ];
    }

    /**
     * @return mixed
     */
    abstract protected function params();

    /**
     * @return string
     */
    abstract protected function method();
}
