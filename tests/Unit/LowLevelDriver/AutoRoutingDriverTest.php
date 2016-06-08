<?php

namespace eLama\DirectApiV5\Test\Unit\LowLevelDriver;

use eLama\DirectApiV5\LowLevelDriver\AutoRoutingDriver;
use eLama\DirectApiV5\LowLevelDriver\LowLevelDriver;
use eLama\DirectApiV5\LowLevelDriver\ProxyDriver;
use eLama\DirectApiV5\Request;
use eLama\DirectApiV5\Serializer\ArraySerializer;
use PHPUnit_Framework_TestCase;

class AutoRoutingDriverTest extends PHPUnit_Framework_TestCase
{
    /** @var ProxyDriver|\Phake_IMock  */
    private $proxyDriver;

    /** @var LowLevelDriver|\Phake_IMock  */
    private $directDriver;

    /** @var  AutoRoutingDriver */
    private $autoRoutingDriver;

    protected function setUp()
    {
        $this->proxyDriver = \Phake::mock(ProxyDriver::class);
        $this->directDriver = \Phake::mock(LowLevelDriver::class);
        $this->autoRoutingDriver = new AutoRoutingDriver($this->proxyDriver, $this->directDriver);
    }

    /**
     * @test
     */
    public function execute_ProxyDriverCanHandleRequest_SendsRequestToProxy()
    {
        \Phake::when($this->proxyDriver)->canHandleRequest(\Phake::anyParameters())->thenReturn(true);

        $request = new Request('token', 'service', 'method', 'params', 'login');
        $serializer = new DummySerializer();
        $this->autoRoutingDriver->execute($request, $serializer);

        \Phake::verify($this->proxyDriver)->execute($request, $serializer);
        \Phake::verify($this->directDriver, \Phake::never())->execute($request, $serializer);
    }

    /**
     * @test
     */
    public function execute_ProxyDriverCanNotHandleRequest_SendsRequestToDirect()
    {
        \Phake::when($this->proxyDriver)->canHandleRequest(\Phake::anyParameters())->thenReturn(false);

        $request = new Request('token', 'service', 'method', 'params', 'login');
        $serializer = new DummySerializer();
        $this->autoRoutingDriver->execute($request, $serializer);

        \Phake::verify($this->directDriver)->execute($request, $serializer);
        \Phake::verify($this->proxyDriver, \Phake::never())->execute($request, $serializer);
    }

}
