<?php

namespace eLama\DirectApiV5\LowLevelDriver;

use eLama\DirectApiV5\Request;
use eLama\DirectApiV5\Serializer\Serializer;
use GuzzleHttp\Promise\Promise;

class ProxyDriver implements LowLevelDriverInterface
{

    /**
     * @param Request $request
     * @param Serializer $serializer
     * @return Promise on \eLama\DirectApiV5\Response
     * @see \eLama\DirectApiV5\Response
     */
    public function execute(Request $request, Serializer $serializer)
    {
        // TODO: Implement execute() method.
    }

    /**
     * @param Request $request
     * @return bool
     */
    public function canHandleRequest(Request $request)
    {
        
    }
}
