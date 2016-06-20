<?php

namespace Integration\DtoAwareDirectDriver;

use eLama\DirectApiV5\Dto\AdGroup\AddRequest as AdGroupAddRequest;
use eLama\DirectApiV5\Dto\AdGroup\AdGroupAddItem;
use eLama\DirectApiV5\Dto\AdGroup\AdGroupsSelectionCriteria;
use eLama\DirectApiV5\Dto\AdGroup\DeleteRequest as AdGroupDeleteRequest;
use eLama\DirectApiV5\Dto\AdGroup\GetResponseBody;
use eLama\DirectApiV5\Dto\Campaign\AddRequest as CampaignAddRequest;
use eLama\DirectApiV5\Dto\Campaign\CampaignAddItem;
use eLama\DirectApiV5\Dto\Campaign\DeleteRequest;
use eLama\DirectApiV5\Dto\Campaign\TextCampaignAddItem;
use eLama\DirectApiV5\Dto\Campaign\TextCampaignNetworkStrategyAdd;
use eLama\DirectApiV5\Dto\Campaign\TextCampaignNetworkStrategyTypeEnum;
use eLama\DirectApiV5\Dto\Campaign\TextCampaignSearchStrategyAdd;
use eLama\DirectApiV5\Dto\Campaign\TextCampaignSearchStrategyTypeEnum;
use eLama\DirectApiV5\Dto\Campaign\TextCampaignStrategyAdd;
use eLama\DirectApiV5\Dto\General\AddResponseBody;
use eLama\DirectApiV5\Dto\General\DeleteResponseBody;
use eLama\DirectApiV5\Dto\General\IdsCriteria;
use eLama\DirectApiV5\DtoAwareDirectDriver;
use eLama\DirectApiV5\JmsFactory;
use eLama\DirectApiV5\LowLevelDriver\LowLevelDriver;
use eLama\DirectApiV5\RequestBody\AddAdGroupRequestBody;
use eLama\DirectApiV5\RequestBody\AddCampaignRequestBody;
use eLama\DirectApiV5\RequestBody\DeleteAdGroupRequestBody;
use eLama\DirectApiV5\RequestBody\DeleteCampaignRequestBody;
use eLama\DirectApiV5\RequestBody\GetAdGroupsRequestBody;
use GuzzleHttp\Client;
use Monolog\Logger;

class AdGroupTest extends \PHPUnit_Framework_TestCase
{
    const LOGIN = 'ra-trinet-add-dev-01';
    const TOKEN = '3fe13d8bd818458c89624f678f365051';
    const AD_GROUP_NAME = 'Moo';

    /**
     * @var DtoAwareDirectDriver
     */
    private $driver;

    /**
     * @var int
     */
    private static $campaignId;

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

    public static function setUpBeforeClass()
    {
        $driver = self::createDtoAwareDirectDriver();

        $responseBody = self::createCampaign($driver);

        self::$campaignId = $responseBody->getResult()->getAddResults()[0]->getId();
    }

    public static function tearDownAfterClass()
    {
        if (!empty(self::$campaignId)) {
            $driver = self::createDtoAwareDirectDriver();

            $request = new DeleteCampaignRequestBody(new DeleteRequest(
                new IdsCriteria([self::$campaignId])
            ));

            $driver->call($request);
        }
    }

    private static function createDtoAwareDirectDriver()
    {
        $serializer = JmsFactory::create()->serializer();
        $lo = LowLevelDriver::createAdapterForClient(new Client(), new Logger('Test'), LowLevelDriver::URL_SANDBOX);
        return new DtoAwareDirectDriver($serializer, $lo, self::TOKEN, self::LOGIN);
    }

    /**
     * @param $driver
     * @return AddResponseBody
     */
    private static function createCampaign(DtoAwareDirectDriver $driver)
    {
        $campaignAddItem = new CampaignAddItem('AdTest', (new \DateTime())->format('Y-m-d'));
        $campaignAddItem->setTextCampaign(
            new TextCampaignAddItem(
                new TextCampaignStrategyAdd(
                    new TextCampaignSearchStrategyAdd(TextCampaignSearchStrategyTypeEnum::HIGHEST_POSITION),
                    new TextCampaignNetworkStrategyAdd(TextCampaignNetworkStrategyTypeEnum::MAXIMUM_COVERAGE)
                )
            )
        );
        $request = new AddCampaignRequestBody(
            new CampaignAddRequest([
                $campaignAddItem,
            ])
        );
        /** @var AddResponseBody $responseBody */
        $responseBody = $driver->call($request)->wait()->getUnserializedBody();

        return $responseBody;
    }

}
