<?php

namespace eLama\DirectApiV5\Test\Integration;

use eLama\DirectApiV5\Dto\Campaign\CampaignGetItem;
use eLama\DirectApiV5\Dto\Campaign\CampaignsSelectionCriteria;
use eLama\DirectApiV5\Dto\Campaign\CampaignTypeEnum;
use eLama\DirectApiV5\Dto\General\DeleteRequest;
use eLama\DirectApiV5\Dto\General\IdsCriteria;
use eLama\DirectApiV5\DtoAwareDirectDriver;
use eLama\DirectApiV5\JmsFactory;
use eLama\DirectApiV5\LowLevelDriver\LowLevelDriver;
use eLama\DirectApiV5\RequestBody\DeleteCampaignRequestBody;
use eLama\DirectApiV5\RequestBody\GetCampaignsRequestBody;
use GuzzleHttp\Client;
use Monolog\Logger;

class DirectApiV5TestCase extends \PHPUnit_Framework_TestCase
{
    const LOGIN = 'ra-trinet-add-dev-01';
    const TOKEN = '3fe13d8bd818458c89624f678f365051';

    public static function setUpBeforeClass(DtoAwareDirectDriver $dtoAwareDirectDriver = null)
    {
        if (!$dtoAwareDirectDriver) {
            $dtoAwareDirectDriver = self::createDtoAwareDirectDriver();
        }

        self::clearTestCampaigns($dtoAwareDirectDriver);
    }

    protected static function createDtoAwareDirectDriver($token = self::TOKEN)
    {
        $serializer = JmsFactory::create()->serializer();
        $lo = LowLevelDriver::createAdapterForClient(new Client(), new Logger('Test'), LowLevelDriver::URL_SANDBOX);

        return new DtoAwareDirectDriver($serializer, $lo, $token, self::LOGIN);
    }

    protected static function clearTestCampaigns(DtoAwareDirectDriver $dtoAwareDirectDriver)
    {
        $criteria = new CampaignsSelectionCriteria();
        $criteria->setTypes([CampaignTypeEnum::TEXT_CAMPAIGN]);

        $allSandboxCampaigns = $dtoAwareDirectDriver
            ->callGetCollectingItems(new GetCampaignsRequestBody($criteria))
            ->wait();

        $idsOfCampaignsCreatedByTests = array_map(
            function(CampaignGetItem $campaign) {
                return $campaign->getId();
            },
            array_filter($allSandboxCampaigns, function(CampaignGetItem $campaign) {
                return false === strpos($campaign->getName(), 'Test API Sandbox campaign');
            })
        );

        if (!empty($idsOfCampaignsCreatedByTests)) {
            $dtoAwareDirectDriver
                ->call(new DeleteCampaignRequestBody(new DeleteRequest(
                    new IdsCriteria(array_values($idsOfCampaignsCreatedByTests))
                )))
                ->wait();
        }
    }
}
