<?php
namespace eLama\DirectApiV5\Test\Integration\DtoAwareDirectDriver;

use eLama\DirectApiV5\Dto\Campaign\AddRequest;
use eLama\DirectApiV5\Dto\Campaign\CampaignAddItem;
use eLama\DirectApiV5\Dto\Campaign\CampaignsSelectionCriteria;
use eLama\DirectApiV5\Dto\Campaign\CampaignUpdateItem;
use eLama\DirectApiV5\Dto\Campaign\DeleteRequest;
use eLama\DirectApiV5\Dto\Campaign\GetResponseBody;
use eLama\DirectApiV5\Dto\Campaign\ResumeRequest;
use eLama\DirectApiV5\Dto\Campaign\SuspendRequest;
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
use eLama\DirectApiV5\Dto\General\ResumeResponseBody;
use eLama\DirectApiV5\Dto\General\UpdateResponseBody;
use eLama\DirectApiV5\DtoAwareDirectDriver;
use eLama\DirectApiV5\JmsFactory;
use eLama\DirectApiV5\LowLevelDriver\LowLevelDriver;
use eLama\DirectApiV5\RequestBody\AddCampaignRequestBody;
use eLama\DirectApiV5\RequestBody\DeleteCampaignRequestBody;
use eLama\DirectApiV5\RequestBody\GetCampaignsRequestBody;
use eLama\DirectApiV5\RequestBody\ResumeCampaignsRequestBody;
use eLama\DirectApiV5\RequestBody\SuspendCampaignsRequestBody;
use eLama\DirectApiV5\RequestBody\UpdateCampaignRequestBody;
use GuzzleHttp\Client;
use Monolog\Logger;
use eLama\DirectApiV5\Dto\General\ArrayOfString;
use eLama\DirectApiV5\Dto\Campaign;
use eLama\DirectApiV5\RequestBody;

class CampaignTest extends \PHPUnit_Framework_TestCase
{
    const LOGIN = 'ra-trinet-add-dev-01';
    const TOKEN = '3fe13d8bd818458c89624f678f365051';
    const NAME = 'тестовая кампания';
    const CHANGED_NAME = 'Измененное имя кампании';

    /**
     * @var DtoAwareDirectDriver
     */
    protected $driver;

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
            $this->instanceTextCampaignAddItem()
        );

        $request = new AddCampaignRequestBody(
            new AddRequest([
                $campaignAddItem,
            ])
        );

        $this->addAdditionalParamsToCampaign($campaignAddItem);

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
    public function suspendCampaign($id)
    {
        $request = new SuspendCampaignsRequestBody(new SuspendRequest(
            new IdsCriteria([$id])
        ));
        /** @var \eLama\DirectApiV5\Dto\General\SuspendResponseBody $responseBody */
        $responseBody = $this->driver->call($request)->wait()->getUnserializedBody();
        $suspendedId = $responseBody->getResult()->getSuspendResults()[0]->getId();

        assertThat($suspendedId, is(equalTo($id)));

        return $id;
    }

    /**
     * @test
     * @depends suspendCampaign
     */
    public function resumeCampaign($id)
    {
        $request = new ResumeCampaignsRequestBody(new ResumeRequest(
            new IdsCriteria([$id])
        ));
        /** @var ResumeResponseBody $responseBody */
        $responseBody = $this->driver->call($request)->wait()->getUnserializedBody();
        $resumedId = $responseBody->getResult()->getResumeResults()[0]->getId();

        assertThat($resumedId, is(equalTo($id)));

        return $id;
    }

    /**
     * @test
     * @depends resumeCampaign
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

    private function instanceTimeTargetingAdd()
    {
        $timeTargetingAdd = new Campaign\TimeTargetingAdd();

        $timeTargetingAdd->setSchedule(
            $this->getScheduleParams()
        );

        $timeTargetingAdd->setConsiderWorkingWeekends(Campaign\YesNoEnum::YES);
        $timeTargetingAdd->setHolidaysSchedule(
            (new Campaign\TimeTargetingOnPublicHolidays(
                Campaign\YesNoEnum::NO)
            )
                ->setBidPercent(10)
                ->setStartHour(1)
                ->setEndHour(15)
        );

        return $timeTargetingAdd;
    }

    /**
     * @return Campaign\Notification
     */
    private function instanceNotification()
    {
        $notification = new Campaign\Notification();
        $notification->setSmsSettings(
            (new Campaign\SmsSettings())->setEvents([
                Campaign\SmsEventsEnum::MONEY_IN,
                Campaign\SmsEventsEnum::FINISHED,
                Campaign\SmsEventsEnum::MONEY_OUT,
                Campaign\SmsEventsEnum::MONITORING,
            ])->setTimeFrom('09:00')
                ->setTimeTo('19:45')
        );

        $notification->setEmailSettings(
            (new Campaign\EmailSettings())
                ->setEmail('email@email.ru')
                ->setCheckPositionInterval(Campaign\CheckPositionIntervalEnum::INTERVAL_15)
                ->setWarningBalance(30)
                ->setSendAccountNews(Campaign\YesNoEnum::YES)
                ->setSendWarnings(Campaign\YesNoEnum::YES)
        );

        return $notification;
    }

    /**
     * @return TextCampaignAddItem
     */
    private function instanceTextCampaignAddItem()
    {
        $textCampaignAddItem = new TextCampaignAddItem(
            new TextCampaignStrategyAdd(
                new TextCampaignSearchStrategyAdd(TextCampaignSearchStrategyTypeEnum::HIGHEST_POSITION),
                new TextCampaignNetworkStrategyAdd(TextCampaignNetworkStrategyTypeEnum::MAXIMUM_COVERAGE)
            )
        );

        return $textCampaignAddItem;
    }

    /**
     * @param CampaignAddItem $campaignAddItem
     */
    private function addAdditionalParamsToCampaign(CampaignAddItem $campaignAddItem)
    {
        $campaignAddItem->setBlockedIps(new ArrayOfString(['5.255.255.77', '87.245.198.29']));
        $campaignAddItem->setExcludedSites(new ArrayOfString(['bubububu.ru', 'lalala.ru']));
        $campaignAddItem->setClientInfo('Очень Смешной Петросян');

        $campaignAddItem->setNotification($this->instanceNotification());
        $campaignAddItem->setTimeTargeting($this->instanceTimeTargetingAdd());
        $campaignAddItem->setTimeZone('Europe/Moscow');
        $campaignAddItem->setStartDate(
            (new \DateTime('now'))->add(new \DateInterval('P30D'))->format('Y-m-d')
        );

        $campaignAddItem->setEndDate(
            (new \DateTime('now'))->add(new \DateInterval('P60D'))->format('Y-m-d')
        );

        $campaignAddItem->setDailyBudget(
            new Campaign\DailyBudget(
                3000000000,
                Campaign\DailyBudgetModeEnum::DISTRIBUTED
            )
        );

        $campaignAddItem->setNegativeKeywords(
            new ArrayOfString(['папуас', 'папуасу', 'друг','товарищ', 'и', 'корм'])
        );
    }

    /**
     * @return ArrayOfString
     */
    private function getScheduleParams()
    {
        return new ArrayOfString(
            [
                '1,10,10,50,50,100,100,150,200,200,150,100,100,80,70,100,100,100,50,50,40,30,10,10,10',
                '2,10,10,50,50,100,100,150,200,200,150,100,100,80,70,100,100,100,50,50,40,30,10,10,10',
                '3,10,10,50,50,100,100,150,200,200,150,100,100,80,70,100,100,100,50,50,40,30,10,10,10',
                '4,10,10,50,50,100,100,150,200,200,150,100,100,80,70,100,100,100,50,50,40,30,10,10,10',
                '5,10,10,50,50,100,100,150,200,200,150,100,100,80,70,100,100,100,50,50,40,30,10,10,10',
                '6,10,10,50,50,100,100,150,200,200,150,100,100,80,70,100,100,100,50,50,40,30,10,10,10',
                '7,10,10,50,50,100,100,150,200,200,150,100,100,80,70,100,100,100,50,50,40,30,10,10,10',

            ]
        );
    }
}
