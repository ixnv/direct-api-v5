<?php

namespace eLama\DirectApiV5;

use DateTimeImmutable;

class Response
{
    /** @var string */
    private $requestId;

    /** @var UnitsInfo */
    private $units;

    /** @var DateTimeImmutable */
    private $date;

    /** @var mixed */
    private $body;

    /**
     * @param mixed $body
     * @param string|null $requestId
     * @param DateTimeImmutable|null $date
     * @param UnitsInfo|null $units
     */
    public function __construct($body, $requestId = null, DateTimeImmutable $date = null, UnitsInfo $units = null)
    {
        $this->body = $body;
        $this->requestId = $requestId;
        $this->date = $date;
        $this->units = $units;
    }

    /**
     * @return string|null
     */
    public function getRequestId()
    {
        return $this->requestId;
    }

    /**
     * @return UnitsInfo|null
     */
    public function getUnits()
    {
        return $this->units;
    }

    /**
     * @return DateTimeImmutable|null
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }
}
