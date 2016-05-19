<?php

namespace eLama\DirectApiV5\Test\Unit;

class DirectDriverFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function driverForClient_EmptyToken_ThrowsRuntimeException()
    {
        $tokenResolver = function () { return ''; };

        $directDriverFactory = new \eLama\DirectApiV5\DirectDriverFactory(
            \eLama\DirectApiV5\JmsFactory::create()->serializer(),
            new \GuzzleHttp\Client(),
            $tokenResolver
        );

        $this->setExpectedException(\RuntimeException::class);
        $directDriverFactory->driverForClient('some-login');
    }

    /**
     * @test
     */
    public function driverForClient_TokenContainsAtLeastOneCharacter_CreatesDriver()
    {
        $tokenResolver = function () { return 'a'; };

        $directDriverFactory = new \eLama\DirectApiV5\DirectDriverFactory(
            \eLama\DirectApiV5\JmsFactory::create()->serializer(),
            new \GuzzleHttp\Client(),
            $tokenResolver
        );

        $directDriverFactory->driverForClient('some-login');
    }

}
