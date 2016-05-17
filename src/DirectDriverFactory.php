<?php


namespace eLama\DirectApiV5;

use GuzzleHttp\Client;
use JMS\Serializer\Serializer;

class DirectDriverFactory
{
    /** @var Serializer */
    private $serializer;

    /** @var Client */
    private $client;

    /**
     * @param Serializer $serializer
     * @param Client $client
     */
    public function __construct(Serializer $serializer, Client $client)
    {
        $this->serializer = $serializer;
        $this->client = $client;
    }

    public function driver($token, $login)
    {
        return new DirectDriver($this->serializer, $this->client, $token, $login);
    }
}
