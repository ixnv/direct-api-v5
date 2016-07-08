<?php

namespace eLama\DirectApiV5;

use eLama\DirectApiV5\LowLevelDriver\LowLevelDriver;
use GuzzleHttp\Client;
use JMS\Serializer\Serializer;

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

    /** @var LoggerFactory */
    private $loggerFactory;

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
        $this->loggerFactory = $loggerFactory;
        $this->baseUrl = $baseUrl;
        $this->tokenResolver = $tokenResolver;
    }

    /**
     * @param string $token
     * @param string $login
     * @param string $toolName Строковый код инструмента использующего драйвер
     * @return SimpleDirectDriver
     */
    public function driver($token, $login, $toolName)
    {
        return new SimpleDirectDriver(
            $this->serializer,
            $this->client,
            $this->loggerFactory->create($toolName),
            $this->baseUrl,
            $token,
            $login
        );
    }

    /**
     * @param string $login
     * @param string $toolName Строковый код инструмента использующего драйвер
     * @return SimpleDirectDriver
     */
    public function driverForClient($login, $toolName)
    {
        $tokenResolver = $this->tokenResolver;
        $token = $tokenResolver($login);

        if (empty($token)) {
            throw new \RuntimeException('Token returned by token resolver is empty');
        }

        return $this->driver($token, $login, $toolName);
    }
}
