<?php

namespace eLama\DirectApiV5\Test\Integration;

use eLama\DirectApiV5\Dto\Campaign\CampaignGetItem;
use eLama\DirectApiV5\Dto\Campaign\CampaignsSelectionCriteria;
use eLama\DirectApiV5\Dto\Campaign\Enum\CampaignTypeEnum;
use eLama\DirectApiV5\Dto\General\DeleteRequest;
use eLama\DirectApiV5\Dto\General\IdsCriteria;
use eLama\DirectApiV5\DtoDirectDriver;
use eLama\DirectApiV5\JmsFactory;
use eLama\DirectApiV5\LowLevelDriver\LowLevelDriver;
use eLama\DirectApiV5\RequestBody\DeleteCampaignRequestBody;
use eLama\DirectApiV5\RequestBody\GetCampaignsRequestBody;
use GuzzleHttp\Client;
use Monolog\Logger;
use Psr\Log\LoggerInterface;

class DirectApiV5TestCase extends \PHPUnit_Framework_TestCase
{
    const LOGIN = 'ra-trinet-add-dev-01';
    const TOKEN = '3fe13d8bd818458c89624f678f365051';

    public static function setUpBeforeClass(DtoDirectDriver $DtoDirectDriver = null)
    {
        if (!$DtoDirectDriver) {
            $DtoDirectDriver = self::createDtoDirectDriver();
        }

        self::clearTestCampaigns($DtoDirectDriver);
    }

    protected static function createDtoDirectDriver($token = self::TOKEN)
    {
        $serializer = JmsFactory::create()->serializer();
        $lo = LowLevelDriver::createAdapterForClient(new Client(), \Phake::mock(LoggerInterface::class), LowLevelDriver::URL_SANDBOX);

        return new DtoDirectDriver($serializer, $lo, $token, self::LOGIN);
    }

    protected static function clearTestCampaigns(DtoDirectDriver $dtoDirectDriver)
    {
        $criteria = new CampaignsSelectionCriteria();
        $criteria->setTypes([CampaignTypeEnum::TEXT_CAMPAIGN]);

        $allSandboxCampaigns = $dtoDirectDriver
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
            $dtoDirectDriver
                ->call(new DeleteCampaignRequestBody(new DeleteRequest(
                    new IdsCriteria(array_values($idsOfCampaignsCreatedByTests))
                )))
                ->wait();
        }
    }
}
