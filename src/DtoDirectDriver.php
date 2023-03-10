<?php

namespace eLama\DirectApiV5;

use eLama\DirectApiV5\Dto;
use eLama\DirectApiV5\Dto\General\GetResultGeneral;
use eLama\DirectApiV5\Dto\General\ResponseBody;
use eLama\DirectApiV5\LowLevelDriver\LowLevelDriverInterface;
use eLama\DirectApiV5\RequestBody\GetRequestBody;
use eLama\DirectApiV5\RequestBody\RequestBody;
use eLama\DirectApiV5\Serializer\JmsSerializer;
use JMS\Serializer\Serializer;

class DtoDirectDriver
{

    /** @var string */
    private $login;

    /** @var string */
    private $token;

    /** @var Serializer */
    private $serializer;

    /** @var LowLevelDriverInterface  */
    private $driver;

    /**
     * @param Serializer $jmsSerializer
     * @param LowLevelDriverInterface $driver
     * @param string $token
     * @param string $login
     */
    public function __construct(
        Serializer $jmsSerializer,
        LowLevelDriverInterface $driver,
        $token,
        $login = null
    ) {
        $this->serializer = $jmsSerializer;
        $this->driver = $driver;
        $this->token = $token;
        $this->login = $login;
    }

    /**
     * @return string | null
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param RequestBody $request
     * @return \GuzzleHttp\Promise\PromiseInterface
     * @see Response
     */
    public function call(RequestBody $request)
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
                /** @var ResponseBody $result */
                $result = $response->getUnserializedBody();
                if ($result->getError()) {
                    ErrorException::throwFromError($result->getError(), $directRequest, $response);
                }

                return $response;
            });
    }

    /**
     * @param GetRequestBody $params
     * @return \GuzzleHttp\Promise\PromiseInterface
     */
    public function callGetCollectingItems(GetRequestBody $params)
    {
        return $this->callGet($params)
            ->then(function (array $responses) use ($params) {
                /** @var Response[] $responses */
                $return = [];
                foreach ($responses as $response) {
                    /** @var GetResultGeneral $result */
                    $result = $response->getUnserializedBody()->getResult();
                    foreach ($result->getItems() as $item) {
                        $return[] = $item;
                    }
                }

                if ($params->getLimit() == 1) {
                    $return = isset($return[0]) ? $return[0] : null;
                }

                return $return;
            });
    }

    /**
     * @param GetRequestBody $params
     * @return mixed
     */
    private function callGet(GetRequestBody $params)
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
