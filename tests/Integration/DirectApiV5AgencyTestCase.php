<?php

namespace eLama\DirectApiV5\Test\Integration;

use eLama\DirectApiV5\DtoDirectDriver;
use eLama\DirectApiV5\JmsFactory;
use eLama\DirectApiV5\LowLevelDriver\LowLevelDriver;
use GuzzleHttp\Client;
use Psr\Log\NullLogger;

class DirectApiV5AgencyTestCase extends \PHPUnit_Framework_TestCase
{
    const LOGIN = 'ra-trinet-add-dev-agency-01';
    const TOKEN = 'AQAAAAAhGb9wAASXCVaGLJ7y5EwOq6IQtSohmH4';

    protected static function createDtoDirectDriver($token = self::TOKEN)
    {
        $serializer = JmsFactory::create()->serializer();
        $lo = LowLevelDriver::createAdapterForClient(new Client(), new NullLogger(), LowLevelDriver::URL_SANDBOX);

        return new DtoDirectDriver($serializer, $lo, $token, self::LOGIN);
    }
}
