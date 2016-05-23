<?php

namespace eLama\DirectApiV5\Serializer;

class ArraySerializer implements Serializer
{

    /** @var JmsSerializer */
    private $jms;

    /**
     * @param \JMS\Serializer\Serializer $jms
     */
    public function __construct(\JMS\Serializer\Serializer $jms)
    {
        $this->jms = $jms;
    }

    /**
     * @param mixed $value
     * @return string JSON
     */
    public function serialize($value)
    {
        return $this->jms->serialize($value, 'json');
    }

    /**
     * @param string $json
     * @return mixed
     * @throws \InvalidArgumentException
     */
    public function deserialize($json)
    {
        $data = json_decode($json, true);
        if (JSON_ERROR_NONE !== json_last_error()) {
            $code = json_last_error();
            $msg = json_last_error_msg();
            throw new \RuntimeException("json_decode error ({$code}): {$msg}");
        }

        return $data;
    }
}
