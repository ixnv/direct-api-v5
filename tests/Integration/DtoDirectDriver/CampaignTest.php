<?php

namespace eLama\DirectApiV5\Test\Integration\DtoDirectDriver;

use eLama\DirectApiV5\Dto\Campaign\AddRequest;
use eLama\DirectApiV5\Dto\Campaign\CampaignAddItem;
use eLama\DirectApiV5\Dto\Campaign\CampaignsSelectionCriteria;
use eLama\DirectApiV5\Dto\Campaign\CampaignUpdateItem;
use eLama\DirectApiV5\Dto\Campaign\GetResponseBody;
use eLama\DirectApiV5\Dto\Campaign\ResumeRequest;
use eLama\DirectApiV5\Dto\Campaign\TextCampaignNetworkStrategy;
use eLama\DirectApiV5\Dto\Campaign\TextCampaignSearchStrategy;
use eLama\DirectApiV5\Dto\Campaign\TextCampaignStrategy;
use eLama\DirectApiV5\Dto\General\ArchiveResponseBody;
use eLama\DirectApiV5\Dto\General\SuspendRequest;
use eLama\DirectApiV5\Dto\Campaign\TextCampaignAddItem;
use eLama\DirectApiV5\Dto\Campaign\TextCampaignNetworkStrategyAdd;
use eLama\DirectApiV5\Dto\Campaign\Enum\TextCampaignNetworkStrategyTypeEnum;
use eLama\DirectApiV5\Dto\Campaign\TextCampaignSearchStrategyAdd;
use eLama\DirectApiV5\Dto\Campaign\Enum\TextCampaignSearchStrategyTypeEnum;
use eLama\DirectApiV5\Dto\Campaign\TextCampaignStrategyAdd;
use eLama\DirectApiV5\Dto\Campaign\UpdateRequest;
use eLama\DirectApiV5\Dto\General\AddResponseBody;
use eLama\DirectApiV5\Dto\General\DeleteRequest;
use eLama\DirectApiV5\Dto\General\DeleteResponseBody;
use eLama\DirectApiV5\Dto\General\Enum\YesNoEnum;
use eLama\DirectApiV5\Dto\General\IdsCriteria;
use eLama\DirectApiV5\Dto\General\ResumeResponseBody;
use eLama\DirectApiV5\Dto\General\UnarchiveResponseBody;
use eLama\DirectApiV5\Dto\General\UpdateResponseBody;
use eLama\DirectApiV5\DtoDirectDriver;
use eLama\DirectApiV5\RequestBody\AddCampaignRequestBody;
use eLama\DirectApiV5\RequestBody\DeleteCampaignRequestBody;
use eLama\DirectApiV5\RequestBody\GetCampaignsRequestBody;
use eLama\DirectApiV5\RequestBody\ResumeCampaignsRequestBody;
use eLama\DirectApiV5\RequestBody\SuspendCampaignsRequestBody;
use eLama\DirectApiV5\RequestBody\UpdateCampaignRequestBody;
use eLama\DirectApiV5\Test\Integration\DirectApiV5TestCase;
use eLama\DirectApiV5\Dto\General\ArrayOfString;
use eLama\DirectApiV5\Dto\Campaign;
use eLama\DirectApiV5\RequestBody;

class CampaignTest extends DirectApiV5TestCase
{
    const NAME = 'тестовая кампания';
    const CHANGED_NAME = 'Измененное имя кампании';
    const WEEKLY_SPEND_LIMIT = 300000000;
    const COULD_NOT_ARCHIVE_NOT_STOPPED_CAMPAIGN_ERROR_CODE = 8303;

    /** @var DtoDirectDriver */
    protected $driver;

    public function setUp()
    {
        $this->driver = self::createDtoDirectDriver();
    }

    /**
     * @test
     */
    public function addCampaign()
    {
        $campaignAddItem = new CampaignAddItem(
            self::NAME,
            (new \DateTime('now', new \DateTimeZone('Europe/Moscow')))->format('Y-m-d')
        );
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
     * @return array
     */
    public function textCampaignSearchStrategyProvider()
    {
        return [
            /*стратегии, которые нельзя протестировать, и\или неоправданно дорого
            'average_cpa' => TextCampaignSearchStrategyTypeEnum::AVERAGE_CPA,
            'wb_maximum_conversion_rate' => TextCampaignSearchStrategyTypeEnum::WB_MAXIMUM_CONVERSION_RATE,
            'average_roi' => TextCampaignSearchStrategyTypeEnum::AVERAGE_ROI*/
            'average_cpc' => [TextCampaignSearchStrategyTypeEnum::AVERAGE_CPC],
            'highest_position' => [TextCampaignSearchStrategyTypeEnum::HIGHEST_POSITION],
            'impressions_below_search' => [TextCampaignSearchStrategyTypeEnum::IMPRESSIONS_BELOW_SEARCH],
            'wb_maximum_clicks' => [TextCampaignSearchStrategyTypeEnum::WB_MAXIMUM_CLICKS],
            'weekly_click_package' => [TextCampaignSearchStrategyTypeEnum::WEEKLY_CLICK_PACKAGE],
        ];
    }

    /**
     * @test
     * @dataProvider textCampaignSearchStrategyProvider
     */
    public function createTextCampaignsWithDifferentTextCampaignSearchStrategies($textCampaignSearchStrategyEnum)
    {
        $id = $this->createTextCampaignWithCertainStrategies(
            $textCampaignSearchStrategyEnum,
            TextCampaignNetworkStrategyTypeEnum::NETWORK_DEFAULT
        );

        $this->deleteCampaignById($id);
    }

    /**
     * @return array
     */
    public function textCampaignNetworkStrategyProvider()
    {
        return [
            /*стратегии, которые нельзя протестировать, и\или неоправданно дорого
            'average_cpa' => [TextCampaignNetworkStrategyTypeEnum::AVERAGE_CPA],
            'wb_maximum_conversion_rate' => [TextCampaignNetworkStrategyTypeEnum::WB_MAXIMUM_CONVERSION_RATE],
            'average_roi' => [TextCampaignNetworkStrategyTypeEnum::AVERAGE_ROI],*/
            'average_cpc' => [TextCampaignNetworkStrategyTypeEnum::AVERAGE_CPC],
            'wb_maximum_clicks' => [TextCampaignNetworkStrategyTypeEnum::WB_MAXIMUM_CLICKS],
            'weekly_click_package' => [TextCampaignNetworkStrategyTypeEnum::WEEKLY_CLICK_PACKAGE],
            'maximum_coverage' => [TextCampaignNetworkStrategyTypeEnum::MAXIMUM_COVERAGE]
        ];
    }

    /**
     * @test
     * @dataProvider textCampaignNetworkStrategyProvider
     */
    public function createTextCampaignsWithDifferentTextCampaignNetworkStrategies($textCampaignNetworkStrategyEnum)
    {
        $id = $this->createTextCampaignWithCertainStrategies(
            TextCampaignSearchStrategyTypeEnum::SERVING_OFF,
            $textCampaignNetworkStrategyEnum
        );

        $this->deleteCampaignById($id);
    }

    /**
     * @test
     */
    public function createTextCampaignWithServingOffSearchStrategy()
    {
        $id = $this->createTextCampaignWithCertainStrategies(
            TextCampaignSearchStrategyTypeEnum::SERVING_OFF,
            TextCampaignNetworkStrategyTypeEnum::MAXIMUM_COVERAGE
        );

        $this->deleteCampaign($id);
    }

    /**
     * @test
     */
    public function createTextCampaignWithServingOffNetworkStrategy()
    {
        $id = $this->createTextCampaignWithCertainStrategies(
            TextCampaignSearchStrategyTypeEnum::HIGHEST_POSITION,
            TextCampaignNetworkStrategyTypeEnum::SERVING_OFF
        );

        $this->deleteCampaign($id);
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
        /** @var Campaign\CampaignGetItem $campaign */
        $campaign = $responseBody->getResult()->getCampaigns()[0];

        assertThat($campaign->getName(), is(equalTo(self::NAME)));
        $this->assertTrue($campaign->isShownOnSearch());
        $this->assertTrue($campaign->isShownOnNetwork());

        return $id;
    }

    /**
     * @test
     * @depends getCampaign
     */
    public function modifyCampaign($id)
    {
        $textCampaign = new Campaign\TextCampaignUpdateItem();
        $textCampaign->setBiddingStrategy(
            (new TextCampaignStrategy())
                ->setSearch(new TextCampaignSearchStrategy(TextCampaignSearchStrategyTypeEnum::SERVING_OFF))
                ->setNetwork(new TextCampaignNetworkStrategy(TextCampaignNetworkStrategyTypeEnum::MAXIMUM_COVERAGE))
        );

        $campaign = new CampaignUpdateItem($id);
        $campaign->setName(self::CHANGED_NAME);
        $campaign->setTextCampaign($textCampaign);

        $request = new UpdateCampaignRequestBody(new UpdateRequest([
            $campaign
        ]));
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
        $campaign = $responseBody->getResult()->getCampaigns()[0];
        assertThat($campaign->getName(), is(equalTo(self::CHANGED_NAME)));
        $this->assertFalse($campaign->isShownOnSearch());
        $this->assertTrue($campaign->isShownOnNetwork());

        return $id;
    }

    /**
     * @test
     * @depends getModifiedCampaign
     */
    public function suspendCampaign($id)
    {
        $request = new SuspendCampaignsRequestBody(
            new SuspendRequest(
                new IdsCriteria([$id])
            )
        );
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
    public function archiveCampaign($id)
    {
        $request = new RequestBody\ArchiveCampaignRequestBody([$id]);

        /** @var ArchiveResponseBody $responseBody */
        $responseBody = $this->driver->call($request)->wait()->getUnserializedBody();
        $archived = $responseBody->getResult()->getArchiveResults()[0];

        assertThat(
            $archived->getErrors()[0]->getCode(),
            is(self::COULD_NOT_ARCHIVE_NOT_STOPPED_CAMPAIGN_ERROR_CODE)
        );

        return $id;
    }

    /**
     * @test
     * @depends archiveCampaign
     */
    public function unarchiveCampaign($id)
    {
        $request = new RequestBody\UnarchiveCampaignRequestBody([$id]);

        /** @var UnarchiveResponseBody $responseBody */
        $responseBody = $this->driver->call($request)->wait()->getUnserializedBody();
        $archived = $responseBody->getResult()->getUnarchiveResults()[0];

        assertThat($archived->getId(), $id);

        return $id;
    }

    /**
     * @test
     * @depends unarchiveCampaign
     */
    public function deleteCampaign($id)
    {
        $deletedId = $this->deleteCampaignById($id);

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

    /**
     * @see TextCampaignSearchStrategyTypeEnum
     * @see TextCampaignNetworkStrategyTypeEnum
     * @param string $textCampaignSearchStrategyEnum
     * @param string $textCampaignNetworkStrategyEnum
     * @return int
     */
    private function createTextCampaignWithCertainStrategies(
        $textCampaignSearchStrategyEnum,
        $textCampaignNetworkStrategyEnum
    ) {
        $campaignAddItem = new CampaignAddItem(self::NAME, (new \DateTime())->format('Y-m-d'));
        $campaignAddItem->setTextCampaign(
            $this->instanceTextCampaignAddItemWithCertainStrategies(
                $textCampaignSearchStrategyEnum,
                $textCampaignNetworkStrategyEnum
            )
        );

        $request = new AddCampaignRequestBody(
            new AddRequest([
                $campaignAddItem,
            ])
        );

        /** @var AddResponseBody $responseBody */
        $responseBody = $this->driver->call($request)->wait()->getUnserializedBody();

        return $responseBody->getResult()->getAddResults()[0]->getId();
    }

    private function instanceTimeTargetingAdd()
    {
        $timeTargetingAdd = new Campaign\TimeTargetingAdd();

        $timeTargetingAdd->setSchedule(
            $this->getScheduleParams()
        );

        $timeTargetingAdd->setConsiderWorkingWeekends(YesNoEnum::YES);
        $timeTargetingAdd->setHolidaysSchedule(
            (new Campaign\TimeTargetingOnPublicHolidays(YesNoEnum::NO))
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
                Campaign\Enum\SmsEventsEnum::MONEY_IN,
                Campaign\Enum\SmsEventsEnum::FINISHED,
                Campaign\Enum\SmsEventsEnum::MONEY_OUT,
                Campaign\Enum\SmsEventsEnum::MONITORING,
            ])->setTimeFrom('09:00')
                ->setTimeTo('19:45')
        );

        $notification->setEmailSettings(
            (new Campaign\EmailSettings())
                ->setEmail('email@email.ru')
                ->setCheckPositionInterval(Campaign\Enum\CheckPositionIntervalEnum::INTERVAL_15)
                ->setWarningBalance(30)
                ->setSendAccountNews(YesNoEnum::YES)
                ->setSendWarnings(YesNoEnum::YES)
        );

        return $notification;
    }

    /**
     * @return TextCampaignAddItem
     */
    private function instanceTextCampaignAddItem()
    {
        return new TextCampaignAddItem(
            new TextCampaignStrategyAdd(
                new TextCampaignSearchStrategyAdd(TextCampaignSearchStrategyTypeEnum::HIGHEST_POSITION),
                new TextCampaignNetworkStrategyAdd(TextCampaignNetworkStrategyTypeEnum::MAXIMUM_COVERAGE)
            )
        );
    }

    /**
     * @param string $textCampaignSearchStrategyEnum @see TextCampaignSearchStrategyTypeEnum
     * @param string $textCampaignNetworkStrategyEnum @see TextCampaignNetworkStrategyTypeEnum
     * @return TextCampaignAddItem
     */
    private function instanceTextCampaignAddItemWithCertainStrategies(
        $textCampaignSearchStrategyEnum,
        $textCampaignNetworkStrategyEnum
    ) {
        return new TextCampaignAddItem(
            new TextCampaignStrategyAdd(
                $this->instanceSearchStrategyByEnum($textCampaignSearchStrategyEnum),
                $this->instanceNetworkStrategyByEnum($textCampaignNetworkStrategyEnum)
            )
        );
    }

    /**
     * @param $enum @see TextCampaignSearchStrategyTypeEnum
     * @return TextCampaignSearchStrategyAdd
     */
    private function instanceSearchStrategyByEnum($enum)
    {
        $textCampaignSearchStrategyAdd = new TextCampaignSearchStrategyAdd($enum);

        switch ($enum) {
            case TextCampaignSearchStrategyTypeEnum::AVERAGE_CPA:
                $strategyAverageCpaAdd = new Campaign\StrategyAverageCpaAdd(2000000, 0);
                $strategyAverageCpaAdd->setWeeklySpendLimit(self::WEEKLY_SPEND_LIMIT);
                $strategyAverageCpaAdd->setBidCeiling(2000000);

                $textCampaignSearchStrategyAdd->setAverageCpa($strategyAverageCpaAdd);
                break;
            case TextCampaignSearchStrategyTypeEnum::AVERAGE_ROI:
                $strategyAverageRoiAdd = new Campaign\StrategyAverageRoiAdd(10, 2000000, 0);
                $strategyAverageRoiAdd->setWeeklySpendLimit(self::WEEKLY_SPEND_LIMIT);
                $strategyAverageRoiAdd->setBidCeiling(2000000);
                $strategyAverageRoiAdd->setProfitability(50000000);

                $textCampaignSearchStrategyAdd->setAverageRoi($strategyAverageRoiAdd);
                break;
            case TextCampaignSearchStrategyTypeEnum::AVERAGE_CPC:
                $strategyAverageCpcAdd = new Campaign\StrategyAverageCpcAdd(2000000, self::WEEKLY_SPEND_LIMIT);

                $textCampaignSearchStrategyAdd->setAverageCpc($strategyAverageCpcAdd);
                break;
            case TextCampaignSearchStrategyTypeEnum::WB_MAXIMUM_CLICKS:
                $strategyMaximumClicksAdd = new Campaign\StrategyMaximumClicksAdd();
                $strategyMaximumClicksAdd->setBidCeiling(2000000);
                $strategyMaximumClicksAdd->setWeeklySpendLimit(self::WEEKLY_SPEND_LIMIT);

                $textCampaignSearchStrategyAdd->setWbMaximumClicks($strategyMaximumClicksAdd);
                break;
            case TextCampaignSearchStrategyTypeEnum::WB_MAXIMUM_CONVERSION_RATE:
                $strategyMaximumConversionRateAdd = new Campaign\StrategyMaximumConversionRateAdd(
                    self::WEEKLY_SPEND_LIMIT,
                    0
                );

                $textCampaignSearchStrategyAdd->setWbMaximumConversionRate($strategyMaximumConversionRateAdd);
                break;
            case TextCampaignSearchStrategyTypeEnum::WEEKLY_CLICK_PACKAGE:
                $strategyWeeklyClickPackageAdd = new Campaign\StrategyWeeklyClickPackageAdd();
                $strategyWeeklyClickPackageAdd->setBidCeiling(2000000);
                $strategyWeeklyClickPackageAdd->setClicksPerWeek(100);

                $textCampaignSearchStrategyAdd->setWeeklyClickPackage($strategyWeeklyClickPackageAdd);
                break;
        }

        return $textCampaignSearchStrategyAdd;
    }

    /**
     * @param string $enum @see TextCampaignNetworkStrategyTypeEnum
     * @return TextCampaignNetworkStrategyAdd
     */
    private function instanceNetworkStrategyByEnum($enum)
    {
        $textCampaignNetworkStrategyAdd = new TextCampaignNetworkStrategyAdd($enum);

        switch ($enum) {
            case TextCampaignNetworkStrategyTypeEnum::NETWORK_DEFAULT:
                $strategyNetworkDefaultAdd = new Campaign\StrategyNetworkDefaultAdd();
                $strategyNetworkDefaultAdd->setBidPercent(20);
                $strategyNetworkDefaultAdd->setLimitPercent(100);

                $textCampaignNetworkStrategyAdd->setNetworkDefault($strategyNetworkDefaultAdd);
                break;
            case TextCampaignNetworkStrategyTypeEnum::AVERAGE_CPA:
                $strategyAverageCpaAdd = new Campaign\StrategyAverageCpaAdd(2000000, 0);
                $strategyAverageCpaAdd->setWeeklySpendLimit(self::WEEKLY_SPEND_LIMIT);
                $strategyAverageCpaAdd->setBidCeiling(2000000);

                $textCampaignNetworkStrategyAdd->setAverageCpa($strategyAverageCpaAdd);
                break;
            case TextCampaignNetworkStrategyTypeEnum::AVERAGE_ROI:
                $strategyAverageRoiAdd = new Campaign\StrategyAverageRoiAdd(10, 2000000, 0);
                $strategyAverageRoiAdd->setWeeklySpendLimit(self::WEEKLY_SPEND_LIMIT);
                $strategyAverageRoiAdd->setBidCeiling(2000000);
                $strategyAverageRoiAdd->setProfitability(50000000);

                $textCampaignNetworkStrategyAdd->setAverageRoi($strategyAverageRoiAdd);
                break;
            case TextCampaignNetworkStrategyTypeEnum::AVERAGE_CPC:
                $strategyAverageCpcAdd = new Campaign\StrategyAverageCpcAdd(2000000, self::WEEKLY_SPEND_LIMIT);

                $textCampaignNetworkStrategyAdd->setAverageCpc($strategyAverageCpcAdd);
                break;
            case TextCampaignNetworkStrategyTypeEnum::WB_MAXIMUM_CLICKS:
                $strategyMaximumClicksAdd = new Campaign\StrategyMaximumClicksAdd();
                $strategyMaximumClicksAdd->setBidCeiling(2000000);
                $strategyMaximumClicksAdd->setWeeklySpendLimit(self::WEEKLY_SPEND_LIMIT);

                $textCampaignNetworkStrategyAdd->setWbMaximumClicks($strategyMaximumClicksAdd);
                break;
            case TextCampaignNetworkStrategyTypeEnum::WB_MAXIMUM_CONVERSION_RATE:
                $strategyMaximumConversionRateAdd = new Campaign\StrategyMaximumConversionRateAdd(
                    self::WEEKLY_SPEND_LIMIT,
                    0
                );

                $textCampaignNetworkStrategyAdd->setWbMaximumConversionRate($strategyMaximumConversionRateAdd);
                break;
            case TextCampaignNetworkStrategyTypeEnum::WEEKLY_CLICK_PACKAGE:
                $strategyWeeklyClickPackageAdd = new Campaign\StrategyWeeklyClickPackageAdd();
                $strategyWeeklyClickPackageAdd->setBidCeiling(2000000);
                $strategyWeeklyClickPackageAdd->setClicksPerWeek(100);

                $textCampaignNetworkStrategyAdd->setWeeklyClickPackage($strategyWeeklyClickPackageAdd);
                break;

        }

        return $textCampaignNetworkStrategyAdd;
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
                Campaign\Enum\DailyBudgetModeEnum::DISTRIBUTED
            )
        );

        $campaignAddItem->setNegativeKeywords(
            new ArrayOfString(['папуас', 'папуасу', 'друг', 'товарищ', 'и', 'корм'])
        );
    }

    /**
     * @param $id
     * @return int|null
     */
    private function deleteCampaignById($id)
    {
        if (null === $id) {
            return $id;
        }

        $request = new DeleteCampaignRequestBody(new DeleteRequest(
            new IdsCriteria([$id])
        ));
        /** @var DeleteResponseBody $responseBody */
        $responseBody = $this->driver->call($request)->wait()->getUnserializedBody();

        return $responseBody->getResult()->getDeleteResults()[0]->getId();
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
