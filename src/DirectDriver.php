<?php

namespace eLama\DirectApiV5;

use eLama\DirectApiV5\Dto;
use eLama\DirectApiV5\Dto\Ad\AdsSelectionCriteria;
use eLama\DirectApiV5\Dto\AdGroup\AdGroupsSelectionCriteria;
use eLama\DirectApiV5\Dto\Campaign;
use eLama\DirectApiV5\Dto\Campaign\CampaignGetItem;
use eLama\DirectApiV5\Dto\Campaign\CampaignsSelectionCriteria;
use eLama\DirectApiV5\Dto\General\GetAdGroupsRequest;
use eLama\DirectApiV5\Dto\General\GetAdsRequest;
use eLama\DirectApiV5\Dto\General\GetCampaignsRequest;
use eLama\DirectApiV5\Dto\General\GetRequestGeneral;
use eLama\DirectApiV5\Dto\Keyword\KeywordGetItem;
use GuzzleHttp\Client;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Psr7\Response;
use JMS\Serializer\Serializer;

class DirectDriver
{
    /** @var string */
    private $login;

    /** @var Serializer */
    private $serializer;

    /** @var Client */
    private $client;

    /**
     * @param Serializer $jmsSerializer
     * @param Client $client
     */
    public function __construct(Serializer $jmsSerializer, Client $client, $login)
    {
        $this->serializer = $jmsSerializer;
        $this->client = $client;
        $this->login = $login;
    }

    /**
     * @param int $campaignId
     * @return PromiseInterface Promise на AdGroups[]
     * @see AdGroups
     */
    public function getAdGroups($campaignId)
    {
        $criteria = new AdGroupsSelectionCriteria;
        $criteria->addCampaignId($campaignId);

        $request = new GetAdGroupsRequest($criteria);

        return $this->call($request)->then(function (Dto\AdGroup\GetOperationResponse $response) {
            $result = [];
            foreach ($response->getResult()->getAdGroups() as $adGroup) {
                $result[] = new AdGroup(
                    $adGroup->getId(),
                    $adGroup->getRegionIds()
                );
            }
            return new AdGroupCollection($result);
        });
    }

    /**
     * @param int $campaignId
     * @return PromiseInterface Promise на Ad[]
     * @see Ad
     */
    public function getAds($campaignId)
    {
        //TODO: Определиться на счет объявлений: Отклонённые, Остановленные, Архив не нужны, наверное
        $criteria = new AdsSelectionCriteria;
        $criteria->addCampaignId($campaignId);

        $request = new GetAdsRequest($criteria);

        return $this->call($request)->then(function (Dto\Ad\GetOperationResponse $response) : AdCollection {
            $result = [];
            foreach ($response->getResult()->getAds() as $directAd) {
                $result[] = $directAd->toDomain();
            }
            return new AdCollection($result);
        });
    }

    public function getCampaign($campaignId)
    {
        $criteria = new CampaignsSelectionCriteria();
        $criteria->setIds([$campaignId]);

        $getCampaignsRequest = new GetCampaignsRequest($criteria);

        return $this->call($getCampaignsRequest)->then(function (Dto\Campaign\GetOperationResponse $response) {
            /** @var CampaignGetItem $directCampaign */
            $directCampaign = $response->getResult()->getCampaigns()[0];

            return $directCampaign->toDomain();
        });
    }

    public function getKeywords($campaignId)
    {
        $criteria = new Dto\Keyword\KeywordsSelectionCriteria();
        $criteria->addCampaignId($campaignId);
        $criteria->setStates((array)Dto\General\StateEnum::ON);
        $criteria->setStatuses((array)Dto\General\StatusEnum::ACCEPTED);

        $request = new Dto\General\GetKeywordsRequest($criteria);

        return $this->call($request)->then(function (Dto\Keyword\GetOperationResponse $response) : KeywordCollection {
            return new KeywordCollection(array_map(
                function (KeywordGetItem $keywordDto) {
                    return new Keyword(
                        $keywordDto->getId(),
                        $keywordDto->getAdGroupId(),
                        $keywordDto->getKeyword()
                    );
                }, $response->getResult()->getKeywords()));
        });
    }

    private function call(GetRequestGeneral $request)
    {
        $guzzleRequest = $this->createRequestBuilder()
            ->setLogin($this->getLogin())
            ->setRequestDto($request)
            ->getRequest();

        return $this->client->sendAsync($guzzleRequest)->then(
            function (Response $value) use ($request) {
                $contents = $value->getBody()->getContents();
                return $this->serializer->deserialize($contents, $request->resultClass(), 'json');
            }
        );
    }

    private function getLogin()
    {
        return $this->login;
    }

    private function createRequestBuilder()
    {
        return new RequestBuilder($this->serializer);
    }
}
