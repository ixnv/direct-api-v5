<?php

namespace eLama\DirectApiV5\Test\Integration\DtoDirectDriver;

use eLama\DirectApiV5\Dto\AgencyClient\AddRequest;
use eLama\DirectApiV5\Dto\AgencyClient\EmailSubscriptionItem;
use eLama\DirectApiV5\Dto\AgencyClient\Enum\EmailSubscriptionEnum;
use eLama\DirectApiV5\Dto\AgencyClient\NotificationAdd;
use eLama\DirectApiV5\Dto\General\Enum\CurrencyEnum;
use eLama\DirectApiV5\Dto\General\Enum\LangEnum;
use eLama\DirectApiV5\Dto\General\Enum\YesNoEnum;
use eLama\DirectApiV5\DtoDirectDriver;
use eLama\DirectApiV5\RequestBody\AddAgencyClientRequestBody;
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
                new CurrencyEnum(),
                new NotificationAdd(
                    'blaa',
                    new EmailSubscriptionItem(new EmailSubscriptionEnum(), new YesNoEnum()),
                    new LangEnum()
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

}
