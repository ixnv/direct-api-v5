<?php

namespace eLama\DirectApiV5\Test\Unit\Service;

use eLama\DirectApiV5\DtoAwareDirectDriver;
use eLama\DirectApiV5\Service\KeywordService;
use Phake;

class KeywordServiceTest extends \PHPUnit_Framework_TestCase
{
    /** @var KeywordService */
    private $service;

    public function setUp()
    {
        $dtoAwareDirectDriver = Phake::mock(DtoAwareDirectDriver::class);
        $this->service = new KeywordService($dtoAwareDirectDriver);
    }

    /**
     * @test
     */
    public function getNonArchivedKeywords_EmptyCampaignList_ThrowsInvalidArgumentException()
    {
        $this->setExpectedException(\InvalidArgumentException::class);
        $this->service->getNonArchivedKeywords([]);
    }
}
