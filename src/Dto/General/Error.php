<?php


namespace eLama\DirectApiV5\Dto\General;

use Exception;
use JMS\Serializer\Annotation as JMS;
use JMS\Serializer\JsonDeserializationVisitor;

class Error extends Exception
{
    /** @var string */
    private $errorDetail;

    /** @var int */
    private $requestId;

    /**
     * @Jms\HandlerCallback("json",  direction = "deserialization")
     */
    public function __construct(JsonDeserializationVisitor $visitor, array $data)
    {
        parent::__construct($data['error_string'], (int)$data['error_code']);
        $this->errorDetail = $data['error_detail'];
        $this->requestId = $data['request_id'];
    }
}
