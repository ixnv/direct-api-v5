<?php
/**
 * @author: Ilya Cherepanov <i.cherepanov@elama.ru>
 */

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
        'campaign' => [
            'suspend',
            'resume'
        ]
    ];
    public function __construct(LowLevelDriverInterface $driver)
    {
        $this->driver = $driver;
    }
    public function execute(Request $request, Serializer $serializer)
    {
        return $this->driver->execute($request, $serializer)->then(
            function(Response $response) use($request, $serializer) {
                $body = $response->getUnserializedBody();

                if (isset($body['error']['error_code']) && $body['error']['error_code'] == ErrorCode::NOT_ENOUGH_YANDEX_UNITS) {
                    if ($this->isMethodAllowed($request->getService(), $request->getMethod())) {
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
                }

                return $response;
            }
        );
    }

    protected function isMethodAllowed($service, $method)
    {
        return isset($this->allowedMethods[$service]) && in_array($method, $this->allowedMethods[$service]);
    }
}
