<?php

namespace eLama\DirectApiV5\Test\Unit\Service;

use eLama\DirectApiV5\DtoAwareDirectDriver;
use eLama\DirectApiV5\Service\AdService;
use Phake;

class AdServiceTest extends \PHPUnit_Framework_TestCase
{
    /** @var AdService */
    private $service;

    public function setUp()
    {
        $dtoAwareDirectDriver = Phake::mock(DtoAwareDirectDriver::class);
        $this->service = new AdService($dtoAwareDirectDriver);
    }

    /**
     * @test
     */
    public function updateAds_ArrayOfWrongClasses_AssertionException()
    {
        $this->setExpectedException(\Assert\InvalidArgumentException::class);

        $this->service->updateAds([new \stdClass()]);
    }

    /**
     * @test
     */
    public function getNonArchivedAds_EmptyCampaignList_ThrowsInvalidArgumentException()
    {
        $this->setExpectedException(\InvalidArgumentException::class);
        $this->service->getNonArchivedAds([]);
    }
}
