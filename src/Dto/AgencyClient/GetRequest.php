<?php

namespace eLama\DirectApiV5\Dto\AgencyClient;

use eLama\DirectApiV5\Dto\General\GetRequestGeneral;

class GetRequest extends GetRequestGeneral
{
    /**
     * @var AgencyClientsSelectionCriteria $SelectionCriteria
     */
    protected $SelectionCriteria;

    /**
     * @var string[] $FieldNames
     */
    protected $FieldNames;

    /**
     * @param AgencyClientsSelectionCriteria $selectionCriteria
     * @param string[] $fieldNames
     */
    public function __construct($selectionCriteria, array $fieldNames)
    {
        $this->SelectionCriteria = $selectionCriteria;
        $this->FieldNames = $fieldNames;
    }

    /**
     * @return AgencyClientsSelectionCriteria
     */
    public function getSelectionCriteria()
    {
        return $this->SelectionCriteria;
    }

    /**
     * @param AgencyClientsSelectionCriteria $SelectionCriteria
     * @return self
     */
    public function setSelectionCriteria($SelectionCriteria)
    {
        $this->SelectionCriteria = $SelectionCriteria;
    
        return $this;
    }

    /**
     * @return string[]
     */
    public function getFieldNames()
    {
        return $this->FieldNames;
    }

    /**
     * @param string[] $FieldNames
     * @return self
     */
    public function setFieldNames(array $FieldNames)
    {
        $this->FieldNames = $FieldNames;
    
        return $this;
    }
}
