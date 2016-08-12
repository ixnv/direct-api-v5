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

class DriverFactory
{
    /** @var Serializer */
    private $serializer;

    /** @var string */
    private $directBaseUrl;

    /** @var LoggerFactory */
    private $loggerFactory;

    /** @var string */
    private $toolName;
    /**
     * @var Client
     */
    private $client;

    /**
     * @param Serializer $jmsSerializer
     * @param LoggerFactory $loggerFactory
     * @param Client $client
     * @param $toolName
     * @param string $directBaseUrl
     */
    public function __construct(
        Serializer $jmsSerializer,
        LoggerFactory $loggerFactory,
        Client $client,
        $toolName,
        $directBaseUrl = LowLevelDriver::URL_PRODUCTION
    ) {
        $this->serializer = $jmsSerializer;
        $this->directBaseUrl = $directBaseUrl;
        $this->loggerFactory = $loggerFactory;
        $this->toolName = $toolName;
        $this->client = $client;
    }

    /**
     * @param string $token
     * @param string $login
     * @param int $cacheMaxAge in seconds
     * @param string $proxyUrl
     * @param string[] $servicesToProxy
     * @return DtoDirectDriver
     */
    public function createProxyDriverWithFallback(
        $token,
        $login,
        $cacheMaxAge,
        $proxyUrl,
        $servicesToProxy = ['campaigns']
    ) {
        $ensureSuccessDriver = new EnsureSuccessDriver($this->createLowLevelDriver());

        $proxyDriverWithFallback = new ProxyDriverWithFallback(
            new ProxyDriver(
                $this->createGuzzleAdapter(),
                $proxyUrl,
                $cacheMaxAge,
                $servicesToProxy
            ),
            $ensureSuccessDriver
        );

        $autoRoutingDriver = new AutoRoutingDriver($proxyDriverWithFallback, $ensureSuccessDriver);

        return new DtoDirectDriver($this->serializer, $autoRoutingDriver, $token, $login);
    }

    /**
     * @param string $token
     * @param string $login
     * @param int $cacheMaxAge in seconds
     * @param string $proxyUrl
     * @param array $servicesToProxy
     * @return DtoDirectDriver
     */
    public function createProxyDriver($token, $login, $cacheMaxAge, $proxyUrl, $servicesToProxy = ['campaigns'])
    {
        $ensureSuccessDriver = new EnsureSuccessDriver($this->createLowLevelDriver());

        $autoRoutingDriver = new AutoRoutingDriver(
            new ProxyDriver(
                $this->createGuzzleAdapter(),
                $proxyUrl,
                $cacheMaxAge,
                $servicesToProxy
            ),
            $ensureSuccessDriver
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
        $ensureSuccessDriver = new EnsureSuccessDriver($this->createLowLevelDriver());

        return new DtoDirectDriver($this->serializer, $ensureSuccessDriver, $token, $login);
    }

    /**
     * @return LowLevelDriver
     */
    private function createLowLevelDriver()
    {
        return new LowLevelDriver(
            $this->createGuzzleAdapter(),
            $this->loggerFactory->create($this->toolName),
            $this->directBaseUrl
        );
    }

    /**
     * @return Guzzle5Adapter|Guzzle6Adapter
     */
    private function createGuzzleAdapter()
    {
        $client = $this->client;
        if (version_compare($client::VERSION, '6', 'ge')) {
            return new Guzzle6Adapter($client);
        } else {
            return new Guzzle5Adapter($client);
        }
    }

}
