<?php

namespace eLama\DirectApiV5\Dto\Vcard;

use JMS\Serializer\Annotation as JMS;
use eLama\DirectApiV5\Dto\General\IdsCriteria;
use eLama\DirectApiV5\Dto\General\GetRequestGeneral;


/**
 * @JMS\AccessType("public_method")
 */
class GetRequest extends GetRequestGeneral
{

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\General\IdsCriteria")
     *
     * @var IdsCriteria $SelectionCriteria
     */
    private $SelectionCriteria;

    /**
     * @JMS\Type("array<string>")
     *
     * @var string[] $FieldNames
     * @see VCardFieldEnum
     */
    private $FieldNames;

    /**
     * @param IdsCriteria $SelectionCriteria
     * @param VCardFieldEnum $FieldNames
     */
    public function __construct(IdsCriteria $SelectionCriteria = null, $FieldNames = null)
    {
        $this->SelectionCriteria = $SelectionCriteria;
        $this->FieldNames = $FieldNames;
    }

    /**
     * @return IdsCriteria
     */
    public function getSelectionCriteria()
    {
        return $this->SelectionCriteria;
    }

    /**
     * @param IdsCriteria $SelectionCriteria
     * @return \eLama\DirectApiV5\Dto\Vcard\GetRequest
     */
    public function setSelectionCriteria(IdsCriteria $SelectionCriteria)
    {
        $this->SelectionCriteria = $SelectionCriteria;

        return $this;
    }

    /**
     * @return VCardFieldEnum
     */
    public function getFieldNames()
    {
        return $this->FieldNames;
    }

    /**
     * @param VCardFieldEnum $FieldNames
     * @return \eLama\DirectApiV5\Dto\Vcard\GetRequest
     */
    public function setFieldNames($FieldNames)
    {
        $this->FieldNames = $FieldNames;

        return $this;
    }
}
