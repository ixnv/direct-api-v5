<?php

namespace eLama\DirectApiV5\Serializer;

interface Serializer
{
    /**
     * @param mixed $value
     * @return string JSON
     */
    public function serialize($value);

    /**
     * @param string $json
     * @return mixed
     */
    public function deserialize($json);

}
