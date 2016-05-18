<?php

namespace eLama\DirectApiV5\Params;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
abstract class Params
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
    abstract public function params();

    /**
     * @return string
     */
    abstract public function method();
}
