<?php

namespace eLama\DirectApiV5;

use eLama\DirectApiV5\LowLevelDriver\LowLevelDriver;
use GuzzleHttp\Client;
use JMS\Serializer\Serializer;
use Psr\Log\LoggerInterface;

class SimpleDirectDriverFactory
{
    /** @var Serializer */
    private $serializer;

    /** @var Client */
    private $client;

    /** @var string */
    private $baseUrl;

    /** @var callable */
    private $tokenResolver;

    /** @var LoggerInterface */
    private $logger;

    /**
     * @param Serializer $serializer
     * @param Client $client
     * @param LoggerFactory $loggerFactory
     * @param callable $tokenResolver Получает на вход логин, возвращает токен
     * @param string $baseUrl
     */
    public function __construct(
        Serializer $serializer,
        Client $client,
        LoggerFactory $loggerFactory,
        callable $tokenResolver,
        $baseUrl = LowLevelDriver::URL_PRODUCTION
    ) {
        $this->serializer = $serializer;
        $this->client = $client;
        $this->logger = $loggerFactory->create();
        $this->baseUrl = $baseUrl;
        $this->tokenResolver = $tokenResolver;
    }

    public function driver($token, $login)
    {
        return new SimpleDirectDriver($this->serializer, $this->client, $this->logger, $this->baseUrl, $token, $login);
    }

    public function driverForClient($login)
    {
        $tokenResolver = $this->tokenResolver;
        $token = $tokenResolver($login);

        if (empty($token)) {
            throw new \RuntimeException('Token returned by token resolver is empty');
        }

        return new SimpleDirectDriver($this->serializer, $this->client, $this->logger, $this->baseUrl, $token, $login);
    }
}
