<?php
namespace eLama\DirectApiV5\LowLevelDriver;

use eLama\DirectApiV5\Request;

interface ProxyDriverInterface extends LowLevelDriverInterface
{
    /**
     * @param Request $request
     * @return bool
     */
    public function canHandleRequest(Request $request);
}
