<?php

namespace eLama\DirectApiV5\Serializer;

use JMS\Serializer\Serializer;
use eLama\DirectApiV5\Serializer\Serializer as SerializerInterface;

class JmsSerializer implements SerializerInterface
{

    /** @var JmsSerializer */
    private $jms;
    private $resultClass;

    /**
     * @param Serializer $jms
     * @param string $resultClass
     */
    public function __construct(Serializer $jms, $resultClass)
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
