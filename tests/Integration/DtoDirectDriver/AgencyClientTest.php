<?php

namespace eLama\DirectApiV5\Test\Integration\DtoDirectDriver;

use eLama\DirectApiV5\Dto\AgencyClient\AgencyClientsSelectionCriteria;
use eLama\DirectApiV5\Dto\AgencyClient\AddRequest;
use eLama\DirectApiV5\Dto\AgencyClient\AgencyClientUpdateItem;
use eLama\DirectApiV5\Dto\AgencyClient\ClientSettingAddItem;
use eLama\DirectApiV5\Dto\AgencyClient\EmailSubscriptionItem;
use eLama\DirectApiV5\Dto\AgencyClient\Enum\ClientSettingAddEnum;
use eLama\DirectApiV5\Dto\AgencyClient\Enum\EmailSubscriptionEnum;
use eLama\DirectApiV5\Dto\AgencyClient\Enum\PrivilegeEnum;
use eLama\DirectApiV5\Dto\AgencyClient\GetResponseBody;
use eLama\DirectApiV5\Dto\AgencyClient\GrantItem;
use eLama\DirectApiV5\Dto\AgencyClient\NotificationAdd;
use eLama\DirectApiV5\Dto\AgencyClient\UpdateRequest;
use eLama\DirectApiV5\Dto\General\Enum\CurrencyEnum;
use eLama\DirectApiV5\Dto\General\Enum\LangEnum;
use eLama\DirectApiV5\Dto\General\Enum\YesNoEnum;
use eLama\DirectApiV5\DtoDirectDriver;
use eLama\DirectApiV5\RequestBody\AddAgencyClientRequestBody;
use eLama\DirectApiV5\RequestBody\GetAgencyClientsRequestBody;
use eLama\DirectApiV5\RequestBody\UpdateAgencyClientRequestBody;
use eLama\DirectApiV5\Test\Integration\DirectApiV5AgencyTestCase;

class AgencyClientTest extends DirectApiV5AgencyTestCase
{
    /**
     * @var DtoDirectDriver
     */
    protected $driver;

    protected function setUp()
    {
        $this->driver = self::createDtoDirectDriver();
        $this->markTestIncomplete('Пока у Директа проблемы');
    }

    /**
     * @test
     */
    public function addAd()
    {
        $addRequest = new AddRequest(
            'ra-trinet-add-dev-agency-013',
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
        );

        $addRequest->setGrants([
            new GrantItem(PrivilegeEnum::EDIT_CAMPAIGNS, YesNoEnum::YES),
            new GrantItem(PrivilegeEnum::IMPORT_XLS, YesNoEnum::YES),
            new GrantItem(PrivilegeEnum::TRANSFER_MONEY, YesNoEnum::YES),
        ]);

        $addRequest->setSettings([
            new ClientSettingAddItem(ClientSettingAddEnum::CORRECT_TYPOS_AUTOMATICALLY, YesNoEnum::YES),
            new ClientSettingAddItem(ClientSettingAddEnum::DISPLAY_STORE_RATING, YesNoEnum::YES),
        ]);


        $requestBody = new AddAgencyClientRequestBody($addRequest);

        $responseBody = $this->driver->call($requestBody)->wait()->getUnserializedBody();
    }

    /**
     * @test
     */
    public function getAgencyClients()
    {
        $requestBody = new GetAgencyClientsRequestBody((new AgencyClientsSelectionCriteria())->setLogins(['ra-trinet-add-dev-agency-012'])->setArchived(YesNoEnum::NO));

        /** @var GetResponseBody $responseBody */
        $responseBody = $this->driver->call($requestBody)->wait()->getUnserializedBody();
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
    }
}
