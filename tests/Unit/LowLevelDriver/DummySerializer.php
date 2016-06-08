<?php

namespace eLama\DirectApiV5\Test\Unit\LowLevelDriver;

use eLama\DirectApiV5\Serializer\Serializer;

class DummySerializer implements Serializer
{

    /**
     * @param mixed $value
     * @return string JSON
     */
    public function serialize($value)
    {
        throw new \Exception('Should not be called');
    }

    /**
     * @param string $json
     * @return mixed
     */
    public function deserialize($json)
    {
        throw new \Exception('Should not be called');
    }
}
