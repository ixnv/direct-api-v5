<?php

namespace eLama\DirectApiV5\Test\Integration\DtoDirectDriver;

use eLama\DirectApiV5\Dto\AgencyClient\AgencyClientsSelectionCriteria;
use eLama\DirectApiV5\Dto\AgencyClient\AddRequest;
use eLama\DirectApiV5\Dto\AgencyClient\AgencyClientUpdateItem;
use eLama\DirectApiV5\Dto\AgencyClient\EmailSubscriptionItem;
use eLama\DirectApiV5\Dto\AgencyClient\Enum\EmailSubscriptionEnum;
use eLama\DirectApiV5\Dto\AgencyClient\GetResponseBody;
use eLama\DirectApiV5\Dto\AgencyClient\NotificationAdd;
use eLama\DirectApiV5\Dto\AgencyClient\UpdateRequest;
use eLama\DirectApiV5\Dto\General\Enum\CurrencyEnum;
use eLama\DirectApiV5\Dto\General\Enum\LangEnum;
use eLama\DirectApiV5\Dto\General\Enum\YesNoEnum;
use eLama\DirectApiV5\DtoDirectDriver;
use eLama\DirectApiV5\RequestBody\AddAgencyClientRequestBody;
use eLama\DirectApiV5\RequestBody\GetAgencyClientsRequestBody;
use eLama\DirectApiV5\RequestBody\UpdateAgencyClientRequestBody;
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

        $a = 1;
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

    /**
     * @test
     */
    public function updateAgencyClient()
    {
        $requestBody = new UpdateAgencyClientRequestBody(new UpdateRequest([
            (new AgencyClientUpdateItem(54502))->setPhone('+7944112233')
        ]));

        $responseBody = $this->driver->call($requestBody)->wait()->getUnserializedBody();

        $a = 1;
    }
}
