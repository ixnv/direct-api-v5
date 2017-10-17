<?php

namespace eLama\DirectApiV5\Test\Integration\DtoDirectDriver;

use eLama\DirectApiV5\Dto\AgencyClient\AgencyClientsSelectionCriteria;
use eLama\DirectApiV5\Dto\AgencyClient\AddRequest;
use eLama\DirectApiV5\Dto\AgencyClient\EmailSubscriptionItem;
use eLama\DirectApiV5\Dto\AgencyClient\Enum\EmailSubscriptionEnum;
use eLama\DirectApiV5\Dto\AgencyClient\GetResponseBody;
use eLama\DirectApiV5\Dto\AgencyClient\NotificationAdd;
use eLama\DirectApiV5\Dto\General\Enum\CurrencyEnum;
use eLama\DirectApiV5\Dto\General\Enum\LangEnum;
use eLama\DirectApiV5\Dto\General\Enum\YesNoEnum;
use eLama\DirectApiV5\DtoDirectDriver;
use eLama\DirectApiV5\RequestBody\AddAgencyClientRequestBody;
use eLama\DirectApiV5\RequestBody\GetAgencyClientsRequestBody;
use eLama\DirectApiV5\Test\Integration\DirectApiV5TestCase;

class AgencyClientTest extends DirectApiV5TestCase
{
    /**
     * @var DtoDirectDriver
     */
    protected $driver;

    protected function setUp()
    {
        $this->driver = self::createDtoDirectDriver();
    }

    /**
     * @test
     */
    public function addAd()
    {
        $requestBody = new AddAgencyClientRequestBody(
            new AddRequest(
                'test',
                'Имя',
                'Фамилия',
                CurrencyEnum::RUB,
                new NotificationAdd(
                    'test@elama.ru',
                    [
                        new EmailSubscriptionItem(EmailSubscriptionEnum::RECEIVE_RECOMMENDATIONS, YesNoEnum::YES),
                        new EmailSubscriptionItem(EmailSubscriptionEnum::TRACK_MANAGED_CAMPAIGNS, YesNoEnum::NO),
                        new EmailSubscriptionItem(EmailSubscriptionEnum::TRACK_POSITION_CHANGES, YesNoEnum::NO),
                    ],
                    LangEnum::RU
                )
            )
        );

        $responseBody = $this->driver->call($requestBody)->wait()->getUnserializedBody();


//        $sitelinkSetId = $this->createSitelinksSet();
//        $adAddItem = new Ad\AdAddItem(self::$adGroupId);
//        $textAd = new Ad\TextAdAdd(self::TEXT, self::TITLE, YesNoEnum::NO);
//        $textAd->setSitelinkSetId($sitelinkSetId);
//        $textAd->setTitle2(self::TITLE2);
//
//        $this->addAdditionalParamsToTextAdAdd($textAd);
//
//        $adAddItem->setTextAd($textAd);
//
//        $requestBody = new AddAdRequestBody(new Ad\AddRequest([$adAddItem]));
//
//        /** @var AddResponseBody $responseBody */
//        $responseBody = $this->driver->call($requestBody)->wait()->getUnserializedBody();
//
//        $id = $responseBody->getResult()->getAddResults()[0]->getId();
//        assertThat($id, is(typeOf('integer')));
//
//
//


        return 0;
    }

    /**
     * @test
     */
    public function getAgencyClients()
    {
        $requestBody = new GetAgencyClientsRequestBody((new AgencyClientsSelectionCriteria())->setLogins([])->setArchived(YesNoEnum::NO));

        /** @var GetResponseBody $responseBody */
        $responseBody = $this->driver->call($requestBody)->wait()->getUnserializedBody();

        $a = 1;
    }

}
