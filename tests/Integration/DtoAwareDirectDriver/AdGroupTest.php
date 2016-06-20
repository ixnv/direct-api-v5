<?php

namespace eLama\DirectApiV5\Test\Integration\DtoAwareDirectDriver;

use eLama\DirectApiV5\Dto\AdGroup\AddRequest as AdGroupAddRequest;
use eLama\DirectApiV5\Dto\AdGroup\AdGroupAddItem;
use eLama\DirectApiV5\Dto\AdGroup\AdGroupsSelectionCriteria;
use eLama\DirectApiV5\Dto\AdGroup\DeleteRequest as AdGroupDeleteRequest;
use eLama\DirectApiV5\Dto\AdGroup\GetResponseBody;
use eLama\DirectApiV5\Dto\General\AddResponseBody;
use eLama\DirectApiV5\Dto\General\DeleteResponseBody;
use eLama\DirectApiV5\Dto\General\IdsCriteria;
use eLama\DirectApiV5\DtoAwareDirectDriver;
use eLama\DirectApiV5\RequestBody\AddAdGroupRequestBody;
use eLama\DirectApiV5\RequestBody\DeleteAdGroupRequestBody;
use eLama\DirectApiV5\RequestBody\GetAdGroupsRequestBody;

class AdGroupTest extends DirectCampaignExistenceDependantTestCase
{
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
    public function addAdGroup()
    {
        $adGroupAddItem = new AdGroupAddItem(self::AD_GROUP_NAME, self::$campaignId, [1]);

        $request = new AddAdGroupRequestBody(
            new AdGroupAddRequest([$adGroupAddItem])
        );

        /** @var AddResponseBody $responseBody */
        $responseBody = $this->driver->call($request)->wait()->getUnserializedBody();

        $id = $responseBody->getResult()->getAddResults()[0]->getId();
        assertThat($id, is(typeOf('integer')));

        return $id;
    }

    /**
     * @test
     * @depends addAdGroup
     */
    public function getAdGroup($id)
    {
        $request = new GetAdGroupsRequestBody(
            (new AdGroupsSelectionCriteria())->setIds([$id])
        );
        /** @var GetResponseBody $responseBody */
        $responseBody = $this->driver->call($request)->wait()->getUnserializedBody();

        assertThat($responseBody->getResult()->getAdGroups()[0]->getName(), is(equalTo(self::AD_GROUP_NAME)));

        return $id;
    }

    /**
     * @test
     * @depends getAdGroup
     */
    public function deleteAdGroup($id)
    {
        $request = new DeleteAdGroupRequestBody(
            new AdGroupDeleteRequest(new IdsCriteria([$id]))
        );

        /** @var DeleteResponseBody $responseBody */
        $responseBody = $this->driver->call($request)->wait()->getUnserializedBody();
        $deletedId = $responseBody->getResult()->getDeleteResults()[0]->getId();

        assertThat($id, is(equalTo($deletedId)));

        return $id;
    }

    /**
     * @test
     * @depends deleteAdGroup
     */
    public function getDeletedAdGroup($id)
    {
        $request = new GetAdGroupsRequestBody(
            (new AdGroupsSelectionCriteria())->setIds([$id])
        );
        /** @var GetResponseBody $responseBody */
        $responseBody = $this->driver->call($request)->wait()->getUnserializedBody();

        assertThat($responseBody->getResult()->getAdGroups(), emptyArray());
    }
}
