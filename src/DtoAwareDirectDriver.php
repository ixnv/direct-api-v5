<?php

namespace eLama\DirectApiV5;


use eLama\DirectApiV5\Dto;
use eLama\DirectApiV5\Dto\Ad;
use eLama\DirectApiV5\Dto\Campaign;
use eLama\DirectApiV5\Dto\General\GetResultGeneral;
use eLama\DirectApiV5\Dto\General\OperationResponse;
use eLama\DirectApiV5\Dto\Keyword;
use eLama\DirectApiV5\LowLevelDriver\LowLevelDriver;
use eLama\DirectApiV5\Params\GetParams;
use eLama\DirectApiV5\Params\Params;
use eLama\DirectApiV5\Serializer\JmsSerializer;
use JMS\Serializer\Serializer;

class DtoAwareDirectDriver
{

    /** @var string */
    private $login;

    /** @var string */
    private $token;

    /** @var Serializer */
    private $serializer;

    /** @var LowLevelDriver  */
    private $driver;

    /**
     * @param Serializer $jmsSerializer
     * @param LowLevelDriver $driver
     * @param $token
     * @param $login
     */
    public function __construct(
        Serializer $jmsSerializer,
        LowLevelDriver $driver,
        $token,
        $login
    ) {
        $this->serializer = $jmsSerializer;
        $this->login = $login;
        $this->token = $token;
        $this->driver = $driver;
    }

    public function call(Params $request)
    {
        $directRequest = new Request(
            $this->token,
            $request->resource(),
            $request->method(),
            $request->params(),
            $this->login
        );

        $serializer = new JmsSerializer($this->serializer, $request->resultClass());

        return $this->driver
            ->execute($directRequest, $serializer)
            ->then(function (Response $response) use ($directRequest) {
                /** @var OperationResponse $result */
                $result = $response->getUnserializedBody();
                if ($result->getError()) {
                    ErrorException::throwFromError($result->getError(), $directRequest, $response);
                }

                return $response;
            });
    }

    public function callGetCollectingItems(GetParams $params)
    {
        return $this->callGet($params)
            ->then(function (array $responses) {
                /** @var Response[] $responses */
                $return = [];
                foreach ($responses as $response) {
                    /** @var GetResultGeneral $result */
                    $result = $response->getUnserializedBody()->getResult();
                    foreach ($result->getItems() as $item) {
                        $return[] = $item;
                    }
                }

                return $return;
            });
    }

    /**
     * @param GetParams $params
     * @return mixed
     */
    private function callGet(GetParams $params)
    {
        return $this->call($params)
            ->then(function (Response $response) use ($params) {
                /** @var GetResultGeneral $result */
                $result = $response->getUnserializedBody()->getResult();

                if ($result->getLimitedBy()) {
                    return $this->callGet($params->paramsForNextPage($result))
                        ->then(function (array $responses) use ($response) {
                            /** @var Response[] $responses */
                            array_unshift($responses, $response);

                            return $responses;
                        });
                } else {
                    return [$response];
                }
            });
    }


}
