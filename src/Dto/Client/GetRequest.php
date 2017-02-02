<?php

namespace eLama\DirectApiV5\Dto\Client;

use eLama\DirectApiV5\Dto\Client\Enum\ClientFieldEnum;
use eLama\DirectApiV5\Dto\General\GetRequestGeneral;
use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class GetRequest extends GetRequestGeneral
{

    /**
     * @JMS\Type("array<string>")
     *
     * @var ClientFieldEnum $FieldNames
     */
    private $FieldNames;

    /**
     * @param string $FieldNames
     */
    public function __construct($FieldNames = null)
    {
        $this->FieldNames = $FieldNames;
    }

    /**
     * @return ClientFieldEnum
     */
    public function getFieldNames()
    {
        return $this->FieldNames;
    }

    /**
     * @param ClientFieldEnum $FieldNames
     * @return \eLama\DirectApiV5\Dto\Client\GetRequest
     */
    public function setFieldNames($FieldNames)
    {
        $this->FieldNames = $FieldNames;
        return $this;
    }
}
