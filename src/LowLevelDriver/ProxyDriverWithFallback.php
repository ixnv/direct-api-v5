<?php

namespace eLama\DirectApiV5\LowLevelDriver;

use eLama\DirectApiV5\Blocker;
use eLama\DirectApiV5\FileBlocker;
use eLama\DirectApiV5\Request;
use eLama\DirectApiV5\Serializer\Serializer;
use GuzzleHttp\Exception\ConnectException;

class ProxyDriverWithFallback implements ProxyDriverInterface
{
    /** @var ProxyDriverInterface */
    private $proxyDriver;

    /** @var LowLevelDriverInterface */
    private $fallbackDriver;
    /**
     * @var Blocker
     */
    private $blocker;

    public function __construct(
        ProxyDriverInterface $proxyDriver,
        LowLevelDriverInterface $fallbackDriver,
        Blocker $blocker = null
    ) {
        $this->proxyDriver = $proxyDriver;
        $this->fallbackDriver = $fallbackDriver;
        $this->blocker = $blocker ?: new FileBlocker(sys_get_temp_dir() . '/proxy.block', 5 * 60);
    }

    public function execute(Request $request, Serializer $serializer)
    {
        if ($this->blocker->isBlocked()) {
            return $this->fallbackDriver->execute($request, $serializer);
        }

        return $this->proxyDriver->execute($request, $serializer)
            ->otherwise(function ($reason) use ($request, $serializer) {
                if ($reason instanceof ConnectException) {
                    $this->blocker->block();
                }

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
