<?php

namespace eLama\DirectApiV5;

use eLama\DirectApiV5\Dto;
use eLama\DirectApiV5\LowLevelDriver\AutoRoutingDriver;
use eLama\DirectApiV5\LowLevelDriver\Guzzle5Adapter;
use eLama\DirectApiV5\LowLevelDriver\Guzzle6Adapter;
use eLama\DirectApiV5\LowLevelDriver\LowLevelDriver;
use eLama\DirectApiV5\LowLevelDriver\ProxyDriver;
use eLama\DirectApiV5\LowLevelDriver\ProxyDriverWithFallback;
use GuzzleHttp\Client;
use JMS\Serializer\Serializer;
use Psr\Log\LoggerInterface;

class DtoAwareDirectDriverFactory
{
    /** @var Client */
    private $client;

    /** @var Serializer */
    private $serializer;

    /** @var LoggerInterface */
    private $logger;

    /** @var string */
    private $directBaseUrl;

    /** @var string */
    private $proxyBaseUrl;

    /**
     * @param Serializer $jmsSerializer
     * @param Client $client
     * @param string $directBaseUrl
     * @param string $proxyBaseUrl
     * @param LoggerInterface $logger
     */
    public function __construct(
        Serializer $jmsSerializer,
        Client $client,
        $directBaseUrl,
        $proxyBaseUrl,
        LoggerInterface $logger
    ) {
        $this->serializer = $jmsSerializer;
        $this->client = $client;
        $this->logger = $logger;
        $this->directBaseUrl = $directBaseUrl;
        $this->proxyBaseUrl = $proxyBaseUrl;
    }

    /**
     * @param string $token
     * @param string $login
     * @param int $cacheMaxAge in seconds
     * @return DtoAwareDirectDriver
     */
    public function createProxyDriverWithFallback($token, $login, $cacheMaxAge)
    {
        $lowLevelDriver = new LowLevelDriver(
            $this->createGuzzleAdapter(),
            $this->logger,
            $this->directBaseUrl
        );

        $proxyDriver = new ProxyDriver(
            $this->createGuzzleAdapter(),
            $this->proxyBaseUrl,
            $cacheMaxAge
        );

        $proxyDriverWithFallback = new ProxyDriverWithFallback($proxyDriver, $lowLevelDriver);

        $autoRoutingDriver = new AutoRoutingDriver($proxyDriverWithFallback, $lowLevelDriver);

        return new DtoAwareDirectDriver($this->serializer, $autoRoutingDriver, $token, $login);
    }

    /**
     * @param string $token
     * @param string $login
     * @return DtoAwareDirectDriver
     */
    public function create($token, $login)
    {
        $lowLevelDriver = new LowLevelDriver(
            $this->createGuzzleAdapter(),
            $this->logger,
            $this->directBaseUrl
        );

        return new DtoAwareDirectDriver($this->serializer, $lowLevelDriver, $token, $login);
    }

    /**
     * @return Guzzle5Adapter|Guzzle6Adapter
     */
    private function createGuzzleAdapter()
    {
        $client = $this->client;
        if (version_compare($client::VERSION, '6', 'ge')) {
            return new Guzzle6Adapter($this->client);
        } else {
            return new Guzzle5Adapter($this->client);
        }
    }

}
