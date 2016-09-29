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
    private $directUrl;

    /**
     * @param Serializer $jmsSerializer
     * @param LoggerFactory $loggerFactory
     * @param Client $client
     * @param string $toolName
     * @param string $directUrl
     * @param string $proxyUrl
     */
    public function __construct(
        Serializer $jmsSerializer,
        LoggerFactory $loggerFactory,
        Client $client,
        $toolName,
        $directUrl = LowLevelDriver::URL_PRODUCTION,
        $proxyUrl = ''
    ) {
        $this->serializer = $jmsSerializer;
        $this->client = $client;
        $this->logger = $loggerFactory->create($toolName);
        $this->proxyUrl = $proxyUrl;
        $this->directUrl = $directUrl;
    }

    /**
     * @param string $token
     * @param string $login
     * @param int $maxCacheSeconds
     * @param string[] $servicesToProxy    array of services, e.g. ['service']
     * @param array|null $methodsUsingAgencyUnits array like ['service' => ['method']], null for default
     * @return DtoDirectDriver
     */
    public function createProxyDriverWithFallback(
        $token,
        $login,
        $maxCacheSeconds,
        array $servicesToProxy = ['campaigns'],
        array $methodsUsingAgencyUnits = null
    ) {
        $driver = $this->createDriver($methodsUsingAgencyUnits);

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
     * @param string[] $servicesToProxy    array of services, e.g. ['service']
     * @param array|null $methodsUsingAgencyUnits array like ['service' => ['method']], null for default
     * @return DtoDirectDriver
     */
    public function createProxyDriver(
        $token,
        $login,
        $maxCacheSeconds,
        array $servicesToProxy = ['campaigns'],
        array $methodsUsingAgencyUnits = null
    ) {
        $autoRoutingDriver = new AutoRoutingDriver(
            new ProxyDriver(
                $this->createGuzzleAdapter($this->client),
                $this->logger,
                $this->proxyUrl,
                $maxCacheSeconds,
                $servicesToProxy
            ),
            $this->createDriver($methodsUsingAgencyUnits)
        );

        return new DtoDirectDriver($this->serializer, $autoRoutingDriver, $token, $login);
    }

    /**
     * @param string $token
     * @param string $login
     * @param array|null $methodsUsingAgencyUnits array like ['service' => ['method']], null for default
     * @return DtoDirectDriver
     */
    public function create($token, $login, array $methodsUsingAgencyUnits = null)
    {
        if (empty($token) || empty($login)) {
            throw new \RuntimeException('Login and token must be specified');
        }

        return new DtoDirectDriver($this->serializer, $this->createDriver($methodsUsingAgencyUnits), $token, $login);
    }

    /**
     * @param array|null $methodsUsingAgencyUnits
     * @return AgencyUnitsFallbackDriver
     */
    private function createDriver(array $methodsUsingAgencyUnits = null)
    {
        return new AgencyUnitsFallbackDriver(
            new LowLevelDriver(
                $this->createGuzzleAdapter($this->client),
                $this->logger,
                $this->directUrl
            ),
            $methodsUsingAgencyUnits
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
