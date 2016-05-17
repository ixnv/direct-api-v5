<?php


namespace eLama\DirectApiV5;

use eLama\DirectApiV5\Dto\General\GetRequestGeneral;
use GuzzleHttp\Psr7\Request;
use JMS\Serializer\SerializerInterface;

class RequestBuilder
{

    //3fe13d8bd818458c89624f678f365051
    //ra-trinet-add-dev-01

    /** @var GetRequestGeneral */
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
     * @param GetRequestGeneral $getRequest
     * @return RequestBuilder
     */
    public function setRequestDto(GetRequestGeneral $getRequest)
    {
        $this->request = $getRequest;

        return $this;
    }

    /**
     * @return Request
     */
    public function getRequest()
    {
        $jsonBody = $this->serializer->serialize($this->request->getBody(), 'json');

        return new Request(
            'POST',
            $this->request->resource(),
            array_merge($this->headers, self::defaultHeaders()),
            $jsonBody
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
     * @return RequestBuilder
     */
    private function addHeader($header, $value)
    {
        $this->headers[$header] = $value;

        return $this;
    }
}
