<?php

namespace eLama\DirectApiV5\Test\Integration\DtoAwareDirectDriver;

use eLama\DirectApiV5\Dto\General\AddResponseBody;
use eLama\DirectApiV5\Dto\General\DeleteRequest;
use eLama\DirectApiV5\Dto\General\DeleteResponseBody;
use eLama\DirectApiV5\Dto\General\IdsCriteria;
use eLama\DirectApiV5\Dto\Sitelink\AddRequest;
use eLama\DirectApiV5\Dto\Sitelink\GetResponseBody;
use eLama\DirectApiV5\Dto\Sitelink\Sitelink;
use eLama\DirectApiV5\Dto\Sitelink\SitelinksSetAddItem;
use eLama\DirectApiV5\DtoAwareDirectDriver;
use eLama\DirectApiV5\RequestBody\AddSitelinkRequestBody;
use eLama\DirectApiV5\Dto\Ad;
use eLama\DirectApiV5\RequestBody\DeleteSitelinkRequestBody;
use eLama\DirectApiV5\RequestBody\GetSitelinkRequestBody;

class SitelinkTest extends AdGroupExistenceDependantTestCase
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
    public function addSitelink()
    {
        $sitelinkSetAddItem = new SitelinksSetAddItem([
            (new Sitelink('первая ссылка', 'http://ya.ru/1'))->setDescription('description 1'),
            (new Sitelink('вторая ссылка', 'http://ya.ru/2'))->setDescription('description 2'),
            (new Sitelink('третья ссылка', 'http://ya.ru/3'))->setDescription('description 3'),
            (new Sitelink('четвертая ссылка', 'http://ya.ru/4'))->setDescription('description 4'),
        ]);

        $requestBody = new AddSitelinkRequestBody(new AddRequest([$sitelinkSetAddItem]));

        /** @var AddResponseBody $responseBody */
        $responseBody = $this->driver->call($requestBody)->wait()->getUnserializedBody();

        $id = $responseBody->getResult()->getAddResults()[0]->getId();
        assertThat($id, is(typeOf('integer')));

        return $id;
    }

    /**
     * @test
     * @depends addSitelink
     */
    public function getSitelink($setilinkSetId)
    {
        $requestBody = new GetSitelinkRequestBody(
            (new IdsCriteria())->setIds([$setilinkSetId])
        );

        /** @var GetResponseBody $responseBody */
        $responseBody = $this->driver->call($requestBody)->wait()->getUnserializedBody();

        $sitelinksSets = $responseBody->getResult()->getSitelinksSets();

        assertThat($sitelinksSets[0]->getId(), is(equalTo($setilinkSetId)));

        return $setilinkSetId;
    }

    /**
     * @test
     * @depends getSitelink
     */
    public function deleteSitelink($setilinkSetId)
    {
        $requestBody = new DeleteSitelinkRequestBody(
            new DeleteRequest(
                new IdsCriteria([$setilinkSetId])
            )
        );

        /** @var DeleteResponseBody $responseBody */
        $responseBody = $this->driver->call($requestBody)->wait()->getUnserializedBody();

        $sitelinksSets = $responseBody->getResult()->getDeleteResults();

        assertThat($sitelinksSets[0]->getId(), is(equalTo($setilinkSetId)));
        assertThat($sitelinksSets[0]->getErrors(), is(nullValue()));
        assertThat($sitelinksSets[0]->getWarnings(), is(nullValue()));
    }
}
