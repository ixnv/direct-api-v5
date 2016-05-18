<?php

namespace eLama\DirectApiV5\Test\Integration;

use Doctrine\Common\Annotations\AnnotationRegistry;
use eLama\DirectApiV5\DirectDriver;
use eLama\DirectApiV5\Dto\Campaign\CampaignGetItem;
use eLama\DirectApiV5\Dto\Campaign\GetOperationResponse;
use GuzzleHttp\Client;
use JMS\Serializer\Naming\IdenticalPropertyNamingStrategy;
use JMS\Serializer\Naming\SerializedNameAnnotationStrategy;
use JMS\Serializer\SerializerBuilder;
use PHPUnit_Framework_TestCase;

class GeneralTest extends PHPUnit_Framework_TestCase
{
    const LOGIN = 'ra-trinet-add-dev-01';
    const TOKEN = '3fe13d8bd818458c89624f678f365051';

    /**
     * @test
     */
    public function canGetCampaigns()
    {
        $loader = require __DIR__ . '/../../vendor/autoload.php';
        AnnotationRegistry::registerLoader(function ($class) use ($loader) {
            return $loader->loadClass($class);
        });

        $serializer = SerializerBuilder::create()
            ->setPropertyNamingStrategy(new SerializedNameAnnotationStrategy(new IdenticalPropertyNamingStrategy()))
            ->build();
        $client = new Client();
        $directDriver = new DirectDriver($serializer, $client, self::TOKEN, self::LOGIN);

        /** @var GetOperationResponse $campaigns */
        $campaigns = $directDriver->getCampaigns()->wait();

        assertThat($campaigns, is(anInstanceOf(GetOperationResponse::class)));
        assertThat(
            $campaigns->getResult()->getCampaigns(),
            both(arrayWithSize(greaterThan(0)))
              ->andAlso(everyItem(anInstanceOf(CampaignGetItem::class)))
        );
    }

}
