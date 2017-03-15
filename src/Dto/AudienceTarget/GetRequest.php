<?php

namespace eLama\DirectApiV5\Dto\AudienceTarget;

use eLama\DirectApiV5\Dto\General\GetRequestGeneral;

class GetRequest extends GetRequestGeneral
{
    /**
     * @var AudienceTargetSelectionCriteria $SelectionCriteria
     */
    protected $SelectionCriteria;

    /**
     * @var string[] $FieldNames AudienceTargetFieldEnum
     */
    protected $FieldNames;

    /**
     * @param AudienceTargetSelectionCriteria $selectionCriteria
     * @param string[] $fieldNames AudienceTargetFieldEnum
     */
    public function __construct($selectionCriteria, array $fieldNames)
    {
        $this->SelectionCriteria = $selectionCriteria;
        $this->FieldNames = $fieldNames;
    }

    /**
     * @return AudienceTargetSelectionCriteria
     */
    public function getSelectionCriteria()
    {
        return $this->SelectionCriteria;
    }

    /**
     * @param AudienceTargetSelectionCriteria $SelectionCriteria
     * @return self
     */
    public function setSelectionCriteria($SelectionCriteria)
    {
        $this->SelectionCriteria = $SelectionCriteria;
    
        return $this;
    }

    /**
     * @return string[] AudienceTargetFieldEnum
     */
    public function getFieldNames()
    {
        return $this->FieldNames;
    }

    /**
     * @param string[] $FieldNames AudienceTargetFieldEnum
     * @return self
     */
    public function setFieldNames(array $FieldNames)
    {
        $this->FieldNames = $FieldNames;
    
        return $this;
    }
}
