<?php

namespace eLama\DirectApiV5\Test\Unit\RequestBody;

use eLama\DirectApiV5\Dto\Ad\ArchiveRequest;
use eLama\DirectApiV5\RequestBody\ArchiveAdsRequestBody;

class ArchiveAdsRequestBodyTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function method_ResumeAdsRequestBody_ReturnsCorrectValue()
    {
        $requestBody = new ArchiveAdsRequestBody(new ArchiveRequest());

        $method = $requestBody->method();

        self::assertEquals('archive', $method);
    }
}
