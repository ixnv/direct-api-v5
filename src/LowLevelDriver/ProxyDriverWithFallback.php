<?php

namespace eLama\DirectApiV5\LowLevelDriver;

use eLama\DirectApiV5\Request;
use eLama\DirectApiV5\Serializer\Serializer;

class ProxyDriverWithFallback implements ProxyDriverInterface
{
    /** @var ProxyDriverInterface */
    private $proxyDriver;

    /** @var LowLevelDriverInterface */
    private $fallbackDriver;

    public function __construct(ProxyDriverInterface $proxyDriver, LowLevelDriverInterface $fallbackDriver)
    {
        $this->proxyDriver = $proxyDriver;
        $this->fallbackDriver = $fallbackDriver;
    }

    public function execute(Request $request, Serializer $serializer)
    {
        return $this->proxyDriver->execute($request, $serializer)
            ->otherwise(function ($reason) use ($request, $serializer) {
                return $this->fallbackDriver->execute($request, $serializer);
            });

    }

    /**
     * @param Request $request
     * @return bool
     */
    public function canHandleRequest(Request $request)
    {
        return $this->proxyDriver->canHandleRequest($request);
    }
}
