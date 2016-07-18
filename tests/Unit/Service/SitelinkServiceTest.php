<?php

namespace eLama\DirectApiV5\Test\Unit\Service;

use eLama\DirectApiV5\DtoAwareDirectDriver;
use eLama\DirectApiV5\Service\SitelinkService;
use Phake;

class SitelinkServiceTest extends \PHPUnit_Framework_TestCase
{
    /** @var SitelinkService */
    private $service;

    public function setUp()
    {
        $dtoAwareDirectDriver = Phake::mock(DtoAwareDirectDriver::class);
        $this->service = new SitelinkService($dtoAwareDirectDriver);
    }

    /**
     * @test
     */
    public function getSitelinksSets_EmptyArray_AssertionException()
    {
        $this->setExpectedException(\Assert\InvalidArgumentException::class);

        $this->service->getSitelinksSets([]);
    }

    public function addSitelinksSets_ArrayOfWrongClasses_AssertionException()
    {
        $this->setExpectedException(\Assert\InvalidArgumentException::class);

        $this->service->addSitelinksSets([new \stdClass()]);
    }
}
