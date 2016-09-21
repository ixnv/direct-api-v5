<?php

namespace eLama\DirectApiV5\Test\Unit\LowLevelDriver;

use eLama\DirectApiV5\Blocker;
use eLama\DirectApiV5\LowLevelDriver\LowLevelDriver;
use eLama\DirectApiV5\LowLevelDriver\ProxyDriver;
use eLama\DirectApiV5\LowLevelDriver\ProxyDriverWithFallback;
use eLama\DirectApiV5\Request;
use GuzzleHttp\Exception\ConnectException;

class ProxyDriverWithFallbackTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ProxyDriver|\Phake_IMock
     */
    private $proxyDriver;

    /**
     * @var LowLevelDriver|\Phake_IMock
     */
    private $directDriver;

    /**
     * @var  ProxyDriverWithFallback
     */
    private $driverWithFallback;

    /**
     * @var Blocker|\Phake_IMock
     */
    private $blocker;

    protected function setUp()
    {
        $this->proxyDriver = \Phake::mock(ProxyDriver::class);
        $this->directDriver = \Phake::mock(LowLevelDriver::class);
        $this->blocker = \Phake::mock(Blocker::class);

        $this->driverWithFallback = new ProxyDriverWithFallback(
            $this->proxyDriver,
            $this->directDriver,
            $this->blocker
        );
    }

    /**
     * @test
     */
    public function execute_ProxyServerIsNotAvailable_SendsRequestToDirect()
    {
        \Phake::when($this->proxyDriver)->canHandleRequest(\Phake::anyParameters())->thenReturn(true);
        \Phake::when($this->proxyDriver)->execute(\Phake::anyParameters())->thenReturn(
            \GuzzleHttp\Promise\rejection_for(new \Exception())
        );

        $request = new Request('token', 'service', 'method', 'params', 'login');
        $serializer = new DummySerializer();
        $this->driverWithFallback->execute($request, $serializer)->wait();

        \Phake::verify($this->proxyDriver)->execute($request, $serializer);
        \Phake::verify($this->directDriver)->execute($request, $serializer);
    }

    /**
     * @test
     */
    public function execute_ProxyDriverCanHandleRequest_ProxyDriverWithFallBackAlsoCanHandleRequest()
    {
        \Phake::when($this->proxyDriver)->canHandleRequest(\Phake::anyParameters())->thenReturn(true);

        $request = new Request('token', 'service', 'method', 'params', 'login');

        assertThat($this->driverWithFallback->canHandleRequest($request), is(true));
    }

    /**
     * @test
     */
    public function execute_ProxyServerConnectionError_Block()
    {
        \Phake::when($this->proxyDriver)->canHandleRequest(\Phake::anyParameters())->thenReturn(true);
        \Phake::when($this->proxyDriver)->execute(\Phake::anyParameters())->thenReturn(
            \GuzzleHttp\Promise\rejection_for(\Phake::mock(ConnectException::class))
        );

        $request = new Request('token', 'service', 'method', 'params', 'login');
        $serializer = new DummySerializer();
        $this->driverWithFallback->execute($request, $serializer)->wait();

        \Phake::verify($this->blocker)->block();
    }

    /**
     * @test
     */
    public function execute_ProxyServerBlocked_UseFallback()
    {
        \Phake::when($this->blocker)->isBlocked()->thenReturn(true);

        $request = new Request('token', 'service', 'method', 'params', 'login');
        $serializer = new DummySerializer();
        $this->driverWithFallback->execute($request, $serializer);

        \Phake::verify($this->proxyDriver, \Phake::never())->execute(\Phake::anyParameters());
        \Phake::verify($this->directDriver)->execute(\Phake::anyParameters());
    }

    /**
     * @test
     */
    public function execute_ProxyServerNotBlocked_UseProxy()
    {
        \Phake::when($this->blocker)->isBlocked()->thenReturn(false);
        \Phake::when($this->proxyDriver)->execute(\Phake::anyParameters())->thenReturn(
            \GuzzleHttp\Promise\promise_for(new \Exception())
        );

        $request = new Request('token', 'service', 'method', 'params', 'login');
        $serializer = new DummySerializer();
        $this->driverWithFallback->execute($request, $serializer);

        \Phake::verify($this->proxyDriver)->execute(\Phake::anyParameters());
    }
}
