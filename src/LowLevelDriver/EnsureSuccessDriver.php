<?php

namespace eLama\DirectApiV5\LowLevelDriver;

use eLama\DirectApiV5\ErrorCode;
use eLama\DirectApiV5\Request;
use eLama\DirectApiV5\Response;
use eLama\DirectApiV5\Serializer\Serializer;

class EnsureSuccessDriver implements LowLevelDriverInterface
{
    /**
     * @var LowLevelDriverInterface
     */
    private $driver;

    /**
     * @var array
     */
    private $allowedMethods = [
        'campaigns' => [
            'suspend',
            'update'
        ],
        'ads' => [
            'suspend'
        ],
        'keywords' => [
            'suspend'
        ]
    ];

    public function __construct(LowLevelDriverInterface $driver)
    {
        $this->driver = $driver;
    }

    public function execute(Request $request, Serializer $serializer)
    {
        return $this->driver->execute($request, $serializer)->then(
            function(Response $response) use ($request, $serializer) {
                if ($this->hasResponseError($response, ErrorCode::NOT_ENOUGH_YANDEX_UNITS) &&
                    $this->isMethodAllowed($request->getService(), $request->getMethod())
                ) {
                    $response = $this->driver->execute(
                        new Request(
                            $request->getToken(),
                            $request->getService(),
                            $request->getMethod(),
                            $request->getParams(),
                            $request->getClientLogin(),
                            $useAgencyUnits = true
                        ),
                        $serializer
                    );
                }

                return $response;
            }
        );
    }

    protected function hasResponseError(Response $response, $error)
    {
        $body = $response->getUnserializedBody();

        return $body->getError() && $body->getError()->getErrorCode() == $error;
    }

    protected function isMethodAllowed($service, $method)
    {
        return isset($this->allowedMethods[$service]) && in_array($method, $this->allowedMethods[$service]);
    }
}
