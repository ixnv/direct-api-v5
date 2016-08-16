<?php

namespace eLama\DirectApiV5;

use eLama\DirectApiV5\Dto;
use eLama\DirectApiV5\LowLevelDriver\AutoRoutingDriver;
use eLama\DirectApiV5\LowLevelDriver\EnsureSuccessDriver;
use eLama\DirectApiV5\LowLevelDriver\Guzzle5Adapter;
use eLama\DirectApiV5\LowLevelDriver\Guzzle6Adapter;
use eLama\DirectApiV5\LowLevelDriver\LowLevelDriver;
use eLama\DirectApiV5\LowLevelDriver\ProxyDriver;
use eLama\DirectApiV5\LowLevelDriver\ProxyDriverWithFallback;
use GuzzleHttp\Client;
use JMS\Serializer\Serializer;
use Psr\Log\LoggerInterface;

class DriverFactory
{
    /** @var Serializer */
    private $serializer;

    /** @var Client */
    private $client;

    /** @var string */
    private $proxyUrl;

    /** @var  LoggerInterface */
    private $logger;

    /**
     * @param Serializer $jmsSerializer
     * @param LoggerFactory $loggerFactory
     * @param Client $client
     * @param string $toolName
     * @param string $directBaseUrl
     * @param string $proxyUrl
     */
    public function __construct(
        Serializer $jmsSerializer,
        LoggerFactory $loggerFactory,
        Client $client,
        $toolName,
        $directBaseUrl = LowLevelDriver::URL_PRODUCTION,
        $proxyUrl = ''
    ) {
        $this->serializer = $jmsSerializer;
        $this->client = $client;
        $this->logger = $loggerFactory->create($toolName);
        $this->driver = new EnsureSuccessDriver(
            new LowLevelDriver(
                $this->createGuzzleAdapter($client),
                $this->logger,
                $directBaseUrl
            )
        );
        $this->proxyUrl = $proxyUrl;
    }

    /**
     * @param string $token
     * @param string $login
     * @param int $maxCacheSeconds
     * @param string[] $servicesToProxy
     * @return DtoDirectDriver
     */
    public function createProxyDriverWithFallback(
        $token,
        $login,
        $maxCacheSeconds,
        array $servicesToProxy = ['campaigns']
    ) {
        $proxyDriverWithFallback = new ProxyDriverWithFallback(
            new ProxyDriver(
                $this->createGuzzleAdapter($this->client),
                $this->logger,
                $this->proxyUrl,
                $maxCacheSeconds,
                $servicesToProxy
            ),
            $this->driver
        );

        $autoRoutingDriver = new AutoRoutingDriver($proxyDriverWithFallback, $this->driver);

        return new DtoDirectDriver($this->serializer, $autoRoutingDriver, $token, $login);
    }

    /**
     * @param string $token
     * @param string $login
     * @param int $maxCacheSeconds
     * @param string[] $servicesToProxy
     * @return DtoDirectDriver
     */
    public function createProxyDriver($token, $login, $maxCacheSeconds, array $servicesToProxy = ['campaigns'])
    {
        $autoRoutingDriver = new AutoRoutingDriver(
            new ProxyDriver(
                $this->createGuzzleAdapter($this->client),
                $this->logger,
                $this->proxyUrl,
                $maxCacheSeconds,
                $servicesToProxy
            ),
            $this->driver
        );

        return new DtoDirectDriver($this->serializer, $autoRoutingDriver, $token, $login);
    }

    /**
     * @param string $token
     * @param string $login
     * @return DtoDirectDriver
     */
    public function create($token, $login)
    {
        if(empty($token) || empty($login)) {
            throw new \RuntimeException('Login and token must be specified');
        }

        return new DtoDirectDriver($this->serializer, $this->driver, $token, $login);
    }


    /**
     * @param Client $client
     * @return Guzzle5Adapter|Guzzle6Adapter
     */
    private function createGuzzleAdapter($client)
    {
        if (version_compare($client::VERSION, '6', 'ge')) {
            return new Guzzle6Adapter($client);
        } else {
            return new Guzzle5Adapter($client);
        }
    }
}
