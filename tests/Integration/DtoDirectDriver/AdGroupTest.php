<?php

namespace eLama\DirectApiV5\Test\Integration\DtoDirectDriver;

use eLama\DirectApiV5\Dto\AdGroup\AddRequest as AdGroupAddRequest;
use eLama\DirectApiV5\Dto\AdGroup\AdGroupAddItem;
use eLama\DirectApiV5\Dto\AdGroup\AdGroupsSelectionCriteria;
use eLama\DirectApiV5\Dto\General\DeleteRequest;
use eLama\DirectApiV5\Dto\AdGroup\GetResponseBody;
use eLama\DirectApiV5\Dto\AdGroup;
use eLama\DirectApiV5\DtoDirectDriver;
use eLama\DirectApiV5\RequestBody\AddAdGroupRequestBody;
use eLama\DirectApiV5\RequestBody\DeleteAdGroupRequestBody;
use eLama\DirectApiV5\RequestBody\GetAdGroupsRequestBody;
use eLama\DirectApiV5\Dto\General;
use eLama\DirectApiV5\Dto\General\ArrayOfString;

class AdGroupTest extends DirectCampaignExistenceDependantTestCase
{
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
    public function addAdGroup()
    {
        $adGroupAddItem = new AdGroupAddItem(self::AD_GROUP_NAME, self::$campaignId, [1]);

        $this->addAdditionalParamsToAdGroup($adGroupAddItem);

        $request = new AddAdGroupRequestBody(
            new AdGroupAddRequest([$adGroupAddItem])
        );

        /** @var General\AddResponseBody $responseBody */
        $responseBody = $this->driver->call($request)->wait()->getUnserializedBody();

        $id = $responseBody->getResult()->getAddResults()[0]->getId();
        assertThat($id, is(typeOf('integer')));

        return $id;
    }

    private function addAdditionalParamsToAdGroup(AdGroupAddItem $adGroupAddItem)
    {
        $adGroupAddItem->setNegativeKeywords(
            new ArrayOfString(['папуас', 'папуасу', 'друг','товарищ', 'и', 'корм'])
        );

        $adGroupAddItem->setTrackingParams('from=direct&ad=42');
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
            new DeleteRequest(new General\IdsCriteria([$id]))
        );

        /** @var General\DeleteResponseBody $responseBody */
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
