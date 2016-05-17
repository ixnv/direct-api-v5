<?php


namespace eLama\DirectApiV5;

use eLama\DirectApiV5\RequestResponse\GeneralRequest;
use GuzzleHttp\Client;
use GuzzleHttp\Message\Request;
use GuzzleHttp\Stream\Stream;
use JMS\Serializer\SerializerInterface;

class RequestBuilder
{

    /** @var GeneralRequest */
    private $request = [];

    /** @var string[] */
    private $headers;

    /** @var SerializerInterface */
    private $serializer;

    /**
     * RequestBuilder constructor.
     * @param SerializerInterface $serializer
     */
    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * @param string $login
     * @return RequestBuilder
     */
    public function setLogin($login)
    {
        $this->addHeader('Client-Login', $login);

        return $this;
    }


    /**
     * @param string $token
     * @return RequestBuilder
     */
    public function setToken($token)
    {
        $this->addHeader('Authorization', 'Bearer ' . $token);

        return $this;
    }

    /**
     * @param GeneralRequest $request
     * @return RequestBuilder
     */
    public function setRequestDto(GeneralRequest $request)
    {
        $this->request = $request;

        return $this;
    }

    /**
     * @return Request
     */
    public function getRequest()
    {
        $jsonBody = $this->serializer->serialize($this->request->getBody(), 'json');

        $majorVersion = explode('.', Client::VERSION)[0];
        $requestClass = $majorVersion == 5 ? '\GuzzleHttp\Message\Request' : '\GuzzleHttp\Psr7\Request';

        return new $requestClass(
            'POST',
            'https://api-sandbox.direct.yandex.com/json/v5/' . $this->request->resource(),
            array_merge($this->headers, self::defaultHeaders()),
            Stream::factory($jsonBody)
        );
    }

    /**
     * @return array
     */
    private static function defaultHeaders()
    {
        return [
            'Accept-Language' => 'ru',
            'Content-Type' => 'application/json; charset=utf-8'
        ];
    }

    /**
     * @param string $header
     * @param string $value
     */
    private function addHeader($header, $value)
    {
        $this->headers[$header] = $value;
    }
}
