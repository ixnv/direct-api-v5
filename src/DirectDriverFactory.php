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

    /** @var callable */
    private $tokenResolver;

    /**
     * @param Serializer $serializer
     * @param Client $client
     * @param callable $tokenResolver Получает на вход логин, возвращает токен
     * @param string $baseUrl
     */
    public function __construct(
        Serializer $serializer,
        Client $client,
        callable $tokenResolver,
        $baseUrl = LowLevelDriver::URL_PRODUCTION
    ) {
        $this->serializer = $serializer;
        $this->client = $client;
        $this->baseUrl = $baseUrl;
        $this->tokenResolver = $tokenResolver;
    }

    public function driver($token, $login)
    {
        return new DirectDriver($this->serializer, $this->client, $this->baseUrl, $token, $login);
    }

    public function driverForClient($login)
    {
        $tokenResolver = $this->tokenResolver;
        $token = $tokenResolver($login);

        if (empty($token)) {
            throw new \RuntimeException('Token returned by token resolver is empty');
        }

        return new DirectDriver($this->serializer, $this->client, $this->baseUrl, $token, $login);
    }
}
