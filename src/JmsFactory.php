<?php

namespace eLama\DirectApiV5;

use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;
use JMS\Serializer\Naming\SerializedNameAnnotationStrategy;
use JMS\Serializer\SerializerBuilder;

class JmsFactory
{

    public static function create()
    {
        return new self();
    }

    /**
     * @return \JMS\Serializer\Serializer
     */
    public function serializer()
    {
        return $this->defaultSerializerBuilder()
            ->build();
    }

    /**
     * @param string $cacheDir
     * @return \JMS\Serializer\Serializer
     */
    public function cachedSerializer($cacheDir)
    {
        return $this->defaultSerializerBuilder()
            ->setCacheDir($cacheDir)
            ->build();
    }

    /**
     * @return SerializerBuilder
     */
    private function defaultSerializerBuilder()
    {
        return SerializerBuilder::create()
            ->setPropertyNamingStrategy(new SerializedNameAnnotationStrategy(new IdenticalPropertyNamingStrategy()));
    }
}
