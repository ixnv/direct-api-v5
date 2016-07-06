<?php

namespace eLama\DirectApiV5\Test\Integration\DtoAwareDirectDriver;

use eLama\DirectApiV5\DtoAwareDirectDriver;
use eLama\DirectApiV5\Dto\Changes;
use eLama\DirectApiV5\RequestBody;
use eLama\DirectApiV5\Response;
use eLama\DirectApiV5\UnitsInfo;

class ChangesTest extends DirectCampaignExistenceDependantTestCase
{
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
        $dateTime = new \DateTime();
        $checkRequest = new Changes\CheckCampaignsRequest($dateTime->format('Y-m-d\TH:i:s\Z'));

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
        $this->assertNotNull($units);
        $this->assertNotNull($units->getDailyLimit());
        $this->assertNotNull($units->getLeft());
        $this->assertNotNull($units->getTaken());
    }
}
