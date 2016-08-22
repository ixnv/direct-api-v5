<?php

namespace eLama\DirectApiV5;

use eLama\DirectApiV5\Dto;
use eLama\DirectApiV5\LowLevelDriver\AutoRoutingDriver;
use eLama\DirectApiV5\LowLevelDriver\AgencyUnitsFallbackDriver;
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

    /** @var string */
    private $directBaseUrl;

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
        $this->proxyUrl = $proxyUrl;
        $this->directBaseUrl = $directBaseUrl;
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
        $driver = $this->createDriver();

        $proxyDriverWithFallback = new ProxyDriverWithFallback(
            new ProxyDriver(
                $this->createGuzzleAdapter($this->client),
                $this->logger,
                $this->proxyUrl,
                $maxCacheSeconds,
                $servicesToProxy
            ),
            $driver
        );

        $autoRoutingDriver = new AutoRoutingDriver($proxyDriverWithFallback, $driver);

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
            $this->createDriver()
        );

        return new DtoDirectDriver($this->serializer, $autoRoutingDriver, $token, $login);
    }

    /**
     * @param string $token
     * @param string $login
     * @param array $allowedMethods
     * @return DtoDirectDriver
     */
    public function create($token, $login, array $allowedMethods = null)
    {
        if(empty($token) || empty($login)) {
            throw new \RuntimeException('Login and token must be specified');
        }

        return new DtoDirectDriver($this->serializer, $this->createDriver($allowedMethods), $token, $login);
    }

    /**
     * @param array|null $allowedMethods
     * @return AgencyUnitsFallbackDriver
     */
    private function createDriver(array $allowedMethods = null)
    {
        return  new AgencyUnitsFallbackDriver(
            new LowLevelDriver(
                $this->createGuzzleAdapter($this->client),
                $this->logger,
                $this->directBaseUrl
            ),
            $allowedMethods
        );
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
