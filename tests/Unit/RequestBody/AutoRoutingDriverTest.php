<?php

namespace eLama\DirectApiV5\Test\Unit\RequestBody;

use eLama\DirectApiV5\Dto\General\ResumeRequest;
use eLama\DirectApiV5\RequestBody\ResumeAdsRequestBody;

class ResumeAdsRequestBodyTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function method_ResumeAdsRequestBody_ReturnsCorrectValue()
    {
        $requestBody = new ResumeAdsRequestBody(new ResumeRequest());

        $method = $requestBody->method();

        self::assertEquals('resume', $method);
    }
}
