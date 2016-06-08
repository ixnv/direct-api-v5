<?php

namespace eLama\DirectApiV5\LowLevelDriver;

use eLama\DirectApiV5\Request;
use eLama\DirectApiV5\Serializer\Serializer;
use GuzzleHttp\Promise\Promise;

class AutoRoutingDriver implements LowLevelDriverInterface
{
    /**
     * @var ProxyDriver
     */
    private $proxyDriver;
    /**
     * @var LowLevelDriver
     */
    private $directDriver;

    public function __construct(ProxyDriver $proxyDriver, LowLevelDriver $directDriver)
    {
        $this->proxyDriver = $proxyDriver;
        $this->directDriver = $directDriver;
    }

    /**
     * @param Request $request
     * @param Serializer $serializer
     * @return Promise on \eLama\DirectApiV5\Response
     * @see \eLama\DirectApiV5\Response
     */
    public function execute(Request $request, Serializer $serializer)
    {
        if ($this->proxyDriver->canHandleRequest($request)) {
            return $this->proxyDriver->execute($request, $serializer);
        }

        return $this->directDriver->execute($request, $serializer);
    }
}
