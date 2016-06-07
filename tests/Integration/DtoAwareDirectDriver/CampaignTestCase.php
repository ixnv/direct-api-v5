<?php
namespace eLama\DirectApiV5\Test\Integration\DtoAwareDirectDriver;

use eLama\DirectApiV5\Dto\Campaign\AddRequest;
use eLama\DirectApiV5\Dto\Campaign\CampaignAddItem;
use eLama\DirectApiV5\Dto\Campaign\CampaignsSelectionCriteria;
use eLama\DirectApiV5\Dto\Campaign\CampaignUpdateItem;
use eLama\DirectApiV5\Dto\Campaign\DeleteRequest;
use eLama\DirectApiV5\Dto\Campaign\GetResponseBody;
use eLama\DirectApiV5\Dto\Campaign\TextCampaignAddItem;
use eLama\DirectApiV5\Dto\Campaign\TextCampaignNetworkStrategyAdd;
use eLama\DirectApiV5\Dto\Campaign\TextCampaignNetworkStrategyTypeEnum;
use eLama\DirectApiV5\Dto\Campaign\TextCampaignSearchStrategyAdd;
use eLama\DirectApiV5\Dto\Campaign\TextCampaignSearchStrategyTypeEnum;
use eLama\DirectApiV5\Dto\Campaign\TextCampaignStrategyAdd;
use eLama\DirectApiV5\Dto\Campaign\UpdateRequest;
use eLama\DirectApiV5\Dto\General\AddResponseBody;
use eLama\DirectApiV5\Dto\General\DeleteResponseBody;
use eLama\DirectApiV5\Dto\General\IdsCriteria;
use eLama\DirectApiV5\Dto\General\UpdateResponseBody;
use eLama\DirectApiV5\DtoAwareDirectDriver;
use eLama\DirectApiV5\ErrorCode;
use eLama\DirectApiV5\JmsFactory;
use eLama\DirectApiV5\LowLevelDriver\LowLevelDriver;
use eLama\DirectApiV5\RequestBody\AddCampaignRequestBody;
use eLama\DirectApiV5\RequestBody\DeleteCampaignRequestBody;
use eLama\DirectApiV5\RequestBody\GetCampaignsRequestBody;
use eLama\DirectApiV5\RequestBody\UpdateCampaignRequestBody;
use GuzzleHttp\Client;
use Monolog\Logger;

class CampaignTestCase extends \PHPUnit_Framework_TestCase
{
    const LOGIN = 'ra-trinet-add-dev-01';
    const TOKEN = '3fe13d8bd818458c89624f678f365051';
    const NAME = 'тестовая кампания';
    const CHANGED_NAME = 'Измененное имя кампании';

    /**
     * @var DtoAwareDirectDriver
     */
    private $driver;

    public function setUp()
    {
        $serializer = JmsFactory::create()->serializer();
        $lo = LowLevelDriver::createAdapterForClient(new Client(), new Logger('Test'), LowLevelDriver::URL_SANDBOX);
        $this->driver = new DtoAwareDirectDriver($serializer, $lo, self::TOKEN, self::LOGIN);
    }


    /**
     * @test
     */
    public function addCampaign()
    {
        $campaignAddItem = new CampaignAddItem(self::NAME, (new \DateTime())->format('Y-m-d'));
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
                $campaignAddItem,
            ])
        );
        /** @var AddResponseBody $responseBody */
        $responseBody = $this->driver->call($request)->wait()->getUnserializedBody();

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
        $request = new GetCampaignsRequestBody(
            (new CampaignsSelectionCriteria())->setIds([$id])
        );
        /** @var GetResponseBody $responseBody */
        $responseBody = $this->driver->call($request)->wait()->getUnserializedBody();
        $name = $responseBody->getResult()->getCampaigns()[0]->getName();
        assertThat($name, is(equalTo(self::NAME)));

        return $id;
    }

    /**
     * @test
     * @depends getCampaign
     */
    public function modifyCampaign($id)
    {
        $request = new UpdateCampaignRequestBody(new UpdateRequest(
            [(new CampaignUpdateItem($id))->setName(self::CHANGED_NAME)]
        ));
        /** @var UpdateResponseBody $responseBody */
        $responseBody = $this->driver->call($request)->wait()->getUnserializedBody();
        $changedId = $responseBody->getResult()->getUpdateResults()[0]->getId();
        assertThat($id, is(equalTo($changedId)));

        return $id;
    }

    /**
     * @test
     * @depends modifyCampaign
     */
    public function getModifiedCampaign($id)
    {
        $request = new GetCampaignsRequestBody(
            (new CampaignsSelectionCriteria())->setIds([$id])
        );
        /** @var GetResponseBody $responseBody */
        $responseBody = $this->driver->call($request)->wait()->getUnserializedBody();
        $name = $responseBody->getResult()->getCampaigns()[0]->getName();
        assertThat($name, is(equalTo(self::CHANGED_NAME)));

        return $id;
    }

    /**
     * @test
     * @depends getModifiedCampaign
     */
    public function deleteCampaign($id)
    {
        $request = new DeleteCampaignRequestBody(new DeleteRequest(
            new IdsCriteria([$id])
        ));
        /** @var DeleteResponseBody $responseBody */
        $responseBody = $this->driver->call($request)->wait()->getUnserializedBody();
        $deletedId = $responseBody->getResult()->getDeleteResults()[0]->getId();

        assertThat($id, is(equalTo($deletedId)));

        return $id;
    }


    /**
     * @test
     * @depends deleteCampaign
     */
    public function getDeletedCampaign($id)
    {
        $request = new GetCampaignsRequestBody(
            (new CampaignsSelectionCriteria())->setIds([$id])
        );
        /** @var GetResponseBody $responseBody */
        $responseBody = $this->driver->call($request)->wait()->getUnserializedBody();

        assertThat($responseBody->getResult()->getCampaigns(), emptyArray());
    }
}
