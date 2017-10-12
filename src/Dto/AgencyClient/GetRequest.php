<?php

namespace eLama\DirectApiV5\AgencyClient;

class GetRequest extends \eLama\DirectApiV5\General\GetRequestGeneral
{
    /**
     * @var eLama\DirectApiV5\AgencyClient\AgencyClientsSelectionCriteria $selectionCriteria
     */
    protected $selectionCriteria;

    /**
     * @var eLama\DirectApiV5\AgencyClient\AgencyClientFieldEnum[] $fieldNames
     */
    protected $fieldNames;

    /**
     * @param eLama\DirectApiV5\AgencyClient\AgencyClientsSelectionCriteria $selectionCriteria
     * @param eLama\DirectApiV5\AgencyClient\AgencyClientFieldEnum[] $fieldNames
     */
    public function __construct($selectionCriteria, array $fieldNames)
    {
        parent::__construct();
        $this->selectionCriteria = $selectionCriteria;
        $this->fieldNames = $fieldNames;
    }

    /**
     * @return eLama\DirectApiV5\AgencyClient\AgencyClientsSelectionCriteria
     */
    public function getSelectionCriteria()
    {
        return $this->selectionCriteria;
    }

    /**
     * @param eLama\DirectApiV5\AgencyClient\AgencyClientsSelectionCriteria $selectionCriteria
     * @return self
     */
    public function setSelectionCriteria($selectionCriteria)
    {
        $this->selectionCriteria = $selectionCriteria;
    
        return $this;
    }

    /**
     * @return eLama\DirectApiV5\AgencyClient\AgencyClientFieldEnum[]
     */
    public function getFieldNames()
    {
        return $this->fieldNames;
    }

    /**
     * @param eLama\DirectApiV5\AgencyClient\AgencyClientFieldEnum[] $fieldNames
     * @return self
     */
    public function setFieldNames(array $fieldNames)
    {
        $this->fieldNames = $fieldNames;
    
        return $this;
    }
}
