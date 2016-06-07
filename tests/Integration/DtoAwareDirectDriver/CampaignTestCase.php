<?php
namespace eLama\DirectApiV5\Test\Integration\DtoAwareDirectDriver;


use eLama\DirectApiV5\Dto\Campaign\AddRequest;
use eLama\DirectApiV5\Dto\Campaign\CampaignAddItem;
use eLama\DirectApiV5\Dto\Campaign\TextCampaignAddItem;
use eLama\DirectApiV5\Dto\Campaign\TextCampaignNetworkStrategyAdd;
use eLama\DirectApiV5\Dto\Campaign\TextCampaignNetworkStrategyTypeEnum;
use eLama\DirectApiV5\Dto\Campaign\TextCampaignSearchStrategyAdd;
use eLama\DirectApiV5\Dto\Campaign\TextCampaignSearchStrategyTypeEnum;
use eLama\DirectApiV5\Dto\Campaign\TextCampaignStrategyAdd;
use eLama\DirectApiV5\Dto\General\AddResponseBody;
use eLama\DirectApiV5\DtoAwareDirectDriver;
use eLama\DirectApiV5\JmsFactory;
use eLama\DirectApiV5\LowLevelDriver\LowLevelDriver;
use eLama\DirectApiV5\RequestBody\AddCampaignRequestBody;
use eLama\DirectApiV5\Response;
use GuzzleHttp\Client;
use Monolog\Logger;

class CampaignTestCase extends \PHPUnit_Framework_TestCase
{
    const LOGIN = 'ra-trinet-add-dev-01';
    const TOKEN = '3fe13d8bd818458c89624f678f365051';

    /**
     * @var DtoAwareDirectDriver
     */
    private $driver;

    public function setUp()
    {
        $serializer = JmsFactory::create()->serializer();
        $lo = LowLevelDriver::createAdapterForClient(new Client(), new Logger('Test'), LowLevelDriver::URL_SANDBOX);
        $this->driver  = new DtoAwareDirectDriver($serializer, $lo, self::TOKEN, self::LOGIN);
    }


    /**
     * @test
     */
    public function addCampaign()
    {
        $campaignAddItem = new CampaignAddItem('тестовая кампания', (new \DateTime())->format('Y-m-d'));
        $campaignAddItem->setTextCampaign(
            new TextCampaignAddItem(
                new TextCampaignStrategyAdd(
                    new TextCampaignSearchStrategyAdd(TextCampaignSearchStrategyTypeEnum::HIGHEST_POSITION),
                    new TextCampaignNetworkStrategyAdd(TextCampaignNetworkStrategyTypeEnum::MAXIMUM_COVERAGE)
                )
            )
        );
        $request = new AddCampaignRequestBody(
            new AddRequest([
                $campaignAddItem
            ])
        );
        /** @var Response $result */
        $result = $this->driver->call($request)->wait();
        /** @var AddResponseBody $responseBody */
        $responseBody = $result->getUnserializedBody();

        $id = $responseBody->getResult()->getAddResults()[0]->getId();
        assertThat($id, is(typeOf('integer')));

        return $id;
    }

    /**
     * @test
     * @depends addCampaign
     */
    public function getCampaign($id)
    {
        $this->markTestIncomplete('todo');
    }

    /**
     * @test
     * @depends getCampaign
     */
    public function modifyCampaign($id)
    {
        $this->markTestIncomplete('todo');
    }

    /**
     * @test
     * @depends modifyCampaign
     */
    public function getModifiedCampaign($id)
    {
        $this->markTestIncomplete('todo');
//        return $id;
    }

    /**
     * @test
     * @depends getModifiedCampaign
     */
    public function deleteCampaign($id)
    {
        $this->markTestIncomplete('todo');
    }


    /**
     * @test
     * @depends deleteCampaign
     */
    public function getDeletedCampaign($id)
    {
        $this->markTestIncomplete('todo');
    }
}
