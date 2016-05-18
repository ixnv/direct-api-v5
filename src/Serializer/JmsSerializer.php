<?php

namespace eLama\DirectApiV5\Serializer;

class JmsSerializer implements Serializer
{

    /** @var JmsSerializer */
    private $jms;
    private $resultClass;

    /**
     * @param \JMS\Serializer\Serializer $jms
     * @param string $resultClass
     */
    public function __construct(\JMS\Serializer\Serializer $jms, $resultClass)
    {
        $this->jms = $jms;
        $this->resultClass = $resultClass;
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
     */
    public function deserialize($json)
    {
        return $this->jms->deserialize($json, $this->resultClass, 'json');
    }
}
