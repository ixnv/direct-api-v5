<?php

namespace eLama\DirectApiV5\Test\Unit\RequestBody;

use eLama\DirectApiV5\Dto\Ad\UnarchiveRequest;
use eLama\DirectApiV5\RequestBody\UnarchiveAdsRequestBody;

class UnarchiveAdsRequestBodyTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function method_ResumeAdsRequestBody_ReturnsCorrectValue()
    {
        $requestBody = new UnarchiveAdsRequestBody(new UnarchiveRequest());

        $method = $requestBody->method();

        self::assertEquals('unarchive', $method);
    }
}
