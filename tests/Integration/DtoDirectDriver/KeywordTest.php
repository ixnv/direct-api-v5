<?php

namespace eLama\DirectApiV5\Test\Integration\DtoDirectDriver;

use eLama\DirectApiV5\Dto\General\AddResponseBody;
use eLama\DirectApiV5\Dto\General\DeleteRequest;
use eLama\DirectApiV5\Dto\General\DeleteResponseBody;
use eLama\DirectApiV5\Dto\General\IdsCriteria;
use eLama\DirectApiV5\Dto\General\SuspendResponseBody;
use eLama\DirectApiV5\Dto\Keyword\AddRequest;
use eLama\DirectApiV5\Dto\Keyword\GetResponseBody;
use eLama\DirectApiV5\Dto\Keyword\KeywordAddItem;
use eLama\DirectApiV5\Dto\Keyword\KeywordsSelectionCriteria;
use eLama\DirectApiV5\DtoDirectDriver;
use eLama\DirectApiV5\RequestBody\AddKeywordRequestBody;
use eLama\DirectApiV5\RequestBody\DeleteKeywordRequestBody;
use eLama\DirectApiV5\RequestBody\GetKeywordsRequestBody;
use eLama\DirectApiV5\Dto\Keyword;
use eLama\DirectApiV5\RequestBody\SuspendKeywordsRequestBody;

class KeywordTest extends AdGroupExistenceDependantTestCase
{
    const PHRASE_1 = 'тестовая фраза1';
    const PHRASE_2 = 'тестовая фраза2';

    /**
     * @var DtoDirectDriver
     */
    private $driver;

    protected function setUp()
    {
        $this->driver = self::createDtoDirectDriver();
    }

    /**
     * @test
     */
    public function addKeyword()
    {
        $id = $this->addCertainKeyword(self::PHRASE_1);
        assertThat($id, is(typeOf('integer')));

        return $id;
    }

    /**
     * @test
     */
    public function suspendKeyword()
    {
        //мы не сможем приостановить keyword, если он один в группе
        $keywordIds[] = $this->addCertainKeyword(self::PHRASE_1);
        $keywordIds[] = $this->addCertainKeyword(self::PHRASE_2);

        $keywordId = $keywordIds[0];
        $actionResults = $this->suspendCertainKeyword($keywordId);

        $this->assertEquals($keywordId, $actionResults[0]->getId());
        $this->assertEmpty($actionResults[0]->getErrors());
        $this->assertEmpty($actionResults[0]->getWarnings());
    }

    /**
     * @test
     * @depends addKeyword
     */
    public function getKeyword($id)
    {
        $requestBody = new GetKeywordsRequestBody(
            (new KeywordsSelectionCriteria())->setIds([$id])
        );

        /** @var GetResponseBody $responseBody */
        $responseBody = $this->driver->call($requestBody)->wait()->getUnserializedBody();

        assertThat($responseBody->getResult()->getKeywords()[0]->getKeyword(), is(equalTo(self::PHRASE_1)));

        return $id;
    }


    /**
     * @test
     * @depends getKeyword
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

    /**
     * @test
     * @depends deleteKeyword
     */
    public function getDeletedKeyword($id)
    {
        $requestBody = new GetKeywordsRequestBody(
            (new KeywordsSelectionCriteria())->setIds([$id])
        );

        /** @var GetResponseBody $responseBody */
        $responseBody = $this->driver->call($requestBody)->wait()->getUnserializedBody();

        assertThat($responseBody->getResult()->getKeywords(), is(emptyArray()));
    }

    /**
     * @param string $keyword
     * @return int
     */
    private function addCertainKeyword($keyword)
    {
        $keywordAddItem = new KeywordAddItem($keyword, self::$adGroupId);

        $requestBody = new AddKeywordRequestBody(new AddRequest([$keywordAddItem]));

        /** @var AddResponseBody $responseBody */
        $responseBody = $this->driver->call($requestBody)->wait()->getUnserializedBody();

        $id = $responseBody->getResult()->getAddResults()[0]->getId();

        return $id;
    }

    /**
     * @param $id
     * @return \eLama\DirectApiV5\Dto\General\ActionResult[]
     */
    private function suspendCertainKeyword($id)
    {
        $suspendRequest = new Keyword\SuspendRequest(
            (new KeywordsSelectionCriteria())->setIds([$id])
        );

        $suspendRequestBody = new SuspendKeywordsRequestBody($suspendRequest);

        /** @var SuspendResponseBody $suspendResponseBody */
        $suspendResponseBody = $this->driver->call($suspendRequestBody)->wait()->getUnserializedBody();

        return $suspendResponseBody->getResult()->getSuspendResults();
    }
}
