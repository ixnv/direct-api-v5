<?php

namespace eLama\DirectApiV5\Test\Integration\DtoAwareDirectDriver;

use eLama\DirectApiV5\Dto\General\AddResponseBody;
use eLama\DirectApiV5\Dto\General\DeleteResponseBody;
use eLama\DirectApiV5\Dto\General\IdsCriteria;
use eLama\DirectApiV5\Dto\Keyword\AddRequest;
use eLama\DirectApiV5\Dto\Keyword\DeleteRequest;
use eLama\DirectApiV5\Dto\Keyword\KeywordAddItem;
use eLama\DirectApiV5\DtoAwareDirectDriver;
use eLama\DirectApiV5\RequestBody\AddKeywordRequestBody;
use eLama\DirectApiV5\RequestBody\DeleteKeywordRequestBody;

class KeywordTest extends DirectCampaignExistenceDependantTestCase
{
    use AdGroupCarrier;

    /**
     * @var DtoAwareDirectDriver
     */
    private $driver;

    protected function setUp()
    {
        $this->driver = self::createDtoAwareDirectDriver();
    }

    /**
     * @test
     */
    public function addKeyword()
    {
        $keywordAddItem = new KeywordAddItem('тестовая фраза', self::$adGroupId);

        $requestBody = new AddKeywordRequestBody(new AddRequest([$keywordAddItem]));

        /** @var AddResponseBody $responseBody */
        $responseBody = $this->driver->call($requestBody)->wait()->getUnserializedBody();

        $id = $responseBody->getResult()->getAddResults()[0]->getId();
        assertThat($id, is(typeOf('integer')));

        return $id;
    }

    /**
     * @test
     * @depends addKeyword
     */
    public function deleteKeyword($id)
    {
        $request = new DeleteKeywordRequestBody(
            new DeleteRequest(new IdsCriteria([$id]))
        );

        /** @var DeleteResponseBody $responseBody */
        $responseBody = $this->driver->call($request)->wait()->getUnserializedBody();
        $deletedId = $responseBody->getResult()->getDeleteResults()[0]->getId();

        assertThat($id, is(equalTo($deletedId)));

        return $id;
    }

    public static function setUpBeforeClass()
    {
        parent::setUpBeforeClass();

        self::createAdGroup();
    }

    public static function tearDownAfterClass()
    {
        self::removeAdGroup();

        parent::tearDownAfterClass();
    }
}
