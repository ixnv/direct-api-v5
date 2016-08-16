<?php

namespace eLama\DirectApiV5\Test\Unit;

use eLama\DirectApiV5\DriverFactory;
use eLama\DirectApiV5\DtoDirectDriver;
use eLama\DirectApiV5\JmsFactory;
use eLama\DirectApiV5\LoggerFactory;
use eLama\DirectApiV5\LowLevelDriver\AutoRoutingDriver;
use eLama\DirectApiV5\LowLevelDriver\EnsureSuccessDriver;
use eLama\DirectApiV5\LowLevelDriver\LowLevelDriver;
use eLama\DirectApiV5\LowLevelDriver\ProxyDriver;
use eLama\DirectApiV5\LowLevelDriver\ProxyDriverWithFallback;
use GuzzleHttp\Client;

class DriverFactoryTest extends \PHPUnit_Framework_TestCase
{
    const TOOL_NAME = 'test tool name';

    /**
     * @test
     * @expectedException \RuntimeException
     */
    public function create_EmptyLoginToken_ThrowsRuntimeException()
    {
        $this->createFactory()->create('', '');
    }

    /**
     * @test
     */
    public function create_ReturnsDtoDirectDriver()
    {
        self::assertInstanceOf(
            DtoDirectDriver::class,
            $this->createFactory()->create('token', 'login')
        );
    }

    /**
     * @test
     */
    public function create_internalDriverIsEnsureLowLevel()
    {
        $dtoDriver = $this->createFactory()->create('token', 'login');
        $ensureDriver = $this->getPrivateValue($dtoDriver, 'driver');
        self::assertInstanceOf(EnsureSuccessDriver::class, $ensureDriver);
        self::assertInstanceOf(LowLevelDriver::class, $this->getPrivateValue($ensureDriver, 'driver'));
    }

    /**
     * @test
     */
    public function createProxyDriver_internalDriverChain()
    {
        $dtoDriver = $this->createFactory()->createProxyDriver('token', 'login', $ttl = 300);
        self::assertInstanceOf(DtoDirectDriver::class, $dtoDriver);

        $autoRoutingDriver = $this->getPrivateValue($dtoDriver, 'driver');
        self::assertInstanceOf(AutoRoutingDriver::class, $autoRoutingDriver);

        self::assertInstanceOf(ProxyDriver::class, $this->getPrivateValue($autoRoutingDriver, 'proxyDriver'));

        $ensureDriver = $this->getPrivateValue($autoRoutingDriver, 'directDriver');
        self::assertInstanceOf(EnsureSuccessDriver::class, $ensureDriver);

        self::assertInstanceOf(LowLevelDriver::class, $this->getPrivateValue($ensureDriver, 'driver'));
    }

    /**
     * @test
     */
    public function createProxyDriverWithFallback_internalDriverChain()
    {
        $dtoDriver = $this->createFactory()->createProxyDriverWithFallback('token', 'login', $ttl = 300);
        self::assertInstanceOf(DtoDirectDriver::class, $dtoDriver);

        $autoRoutingDriver = $this->getPrivateValue($dtoDriver, 'driver');
        self::assertInstanceOf(AutoRoutingDriver::class, $autoRoutingDriver);

        $fallbackDriver = $this->getPrivateValue($autoRoutingDriver, 'proxyDriver');
        self::assertInstanceOf(ProxyDriverWithFallback::class, $fallbackDriver);

        self::assertInstanceOf(ProxyDriver::class, $this->getPrivateValue($fallbackDriver, 'proxyDriver'));

        $fallbackEnsureDriver = $this->getPrivateValue($fallbackDriver, 'fallbackDriver');
        self::assertInstanceOf(EnsureSuccessDriver::class, $fallbackEnsureDriver);

        self::assertInstanceOf(LowLevelDriver::class, $this->getPrivateValue($fallbackEnsureDriver, 'driver'));

        $ensureDriver = $this->getPrivateValue($autoRoutingDriver, 'directDriver');
        self::assertInstanceOf(EnsureSuccessDriver::class, $ensureDriver);

        self::assertInstanceOf(LowLevelDriver::class, $this->getPrivateValue($ensureDriver, 'driver'));
    }

    private function getPrivateValue($object, $property)
    {
        $reflector = new \ReflectionProperty(get_class($object), $property);
        $reflector->setAccessible(true);

        return $reflector->getValue($object);
    }

    private function createFactory()
    {
        return new DriverFactory(
            JmsFactory::create()->serializer(),
            new LoggerFactory([]),
            new Client(),
            self::TOOL_NAME,
            LowLevelDriver::URL_SANDBOX,
            'proxy url'
        );

    }
}
