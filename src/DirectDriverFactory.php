<?php


namespace eLama\DirectApiV5;

use eLama\DirectApiV5\LowLevelDriver\LowLevelDriver;
use GuzzleHttp\Client;
use JMS\Serializer\Serializer;

class DirectDriverFactory
{
    /** @var Serializer */
    private $serializer;

    /** @var Client */
    private $client;

    /** @var string */
    private $baseUrl;

    /**
     * @param Serializer $serializer
     * @param Client $client
     */
    public function __construct(Serializer $serializer, Client $client, $baseUrl = LowLevelDriver::URL_PRODUCTION)
    {
        $this->serializer = $serializer;
        $this->client = $client;
        $this->baseUrl = $baseUrl;
    }

    public function driver($token, $login)
    {
        return new DirectDriver($this->serializer, $this->client, $this->baseUrl, $token, $login);
    }
}
