<?php

namespace eLama\DirectApiV5\LowLevelDriver;

use GuzzleHttp\Promise\PromiseInterface;

interface GuzzleAdapter
{
    /**
     * @param $url
     * @param $headers
     * @param $jsonBody
     * @return PromiseInterface
     */
    public function sendAsync($url, $headers, $jsonBody);
}
