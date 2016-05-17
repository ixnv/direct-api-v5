<?php

namespace eLama\DirectApiV5\RequestResponse;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
abstract class GeneralRequest
{
    const KEY_METHOD = 'method';
    const KEY_PARAMS = 'params';

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
            self::KEY_METHOD => $this->method(),
            self::KEY_PARAMS => $this->params()
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
