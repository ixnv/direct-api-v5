<?php

namespace eLama\DirectApiV5\Test\Integration\DtoAwareDirectDriver;

use eLama\DirectApiV5\DtoAwareDirectDriver;
use eLama\DirectApiV5\Dto\Changes;
use eLama\DirectApiV5\RequestBody;
use eLama\DirectApiV5\Response;
use eLama\DirectApiV5\UnitsInfo;
use eLama\DirectApiV5\JmsFactory;
use eLama\DirectApiV5\LowLevelDriver\LowLevelDriver;
use GuzzleHttp\Client;
use Monolog\Logger;

class ChangesTest extends \PHPUnit_Framework_TestCase
{
    const LOGIN = 'ra-trinet-add-dev-01';
    const TOKEN = '3fe13d8bd818458c89624f678f365051';

    /**
     * @var DtoAwareDirectDriver
     */
    protected $driver;

    protected function setUp()
    {
        $this->driver = self::createDtoAwareDirectDriver();
    }

    /**
     * @test
     */
    public function checkCampaignsForGettingUnits()
    {
        $checkRequest = new Changes\CheckCampaignsRequest(new \DateTimeImmutable());

        $checkCampaignsRequestBody = new RequestBody\CheckCampaignsRequestBody($checkRequest);
        /** @var Response $responseBody */
        $responseBody = $this->driver->call($checkCampaignsRequestBody)->wait();
        $units = $responseBody->getUnits();
        $this->assertThatUnitsIsNotNull($units);
    }

    /**
     * @param UnitsInfo $units
     */
    private function assertThatUnitsIsNotNull(UnitsInfo $units)
    {
        $this->assertNotNull($units->getDailyLimit());
        $this->assertNotNull($units->getLeft());
        $this->assertNotNull($units->getTaken());
    }

    private static function createDtoAwareDirectDriver()
    {
        $serializer = JmsFactory::create()->serializer();
        $lo = LowLevelDriver::createAdapterForClient(new Client(), new Logger('Test'), LowLevelDriver::URL_SANDBOX);
        return new DtoAwareDirectDriver($serializer, $lo, self::TOKEN, self::LOGIN);
    }
}
