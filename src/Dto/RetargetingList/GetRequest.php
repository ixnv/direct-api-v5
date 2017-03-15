<?php

namespace eLama\DirectApiV5\Dto\RetargetingList;

use eLama\DirectApiV5\Dto\General\GetRequestGeneral;

class GetRequest extends GetRequestGeneral
{
    /**
     * @var RetargetingListSelectionCriteria $SelectionCriteria
     */
    protected $SelectionCriteria;

    /**
     * @var string[] $FieldNames RetargetingListFieldEnum
     */
    protected $FieldNames;

    /**
     * @param string[] $fieldNames RetargetingListFieldEnum
     */
    public function __construct(RetargetingListSelectionCriteria $selectionCriteria, array $fieldNames)
    {
        $this->SelectionCriteria = $selectionCriteria;
        $this->FieldNames = $fieldNames;
    }

    /**
     * @return RetargetingListSelectionCriteria
     */
    public function getSelectionCriteria()
    {
        return $this->SelectionCriteria;
    }

    /**
     * @param RetargetingListSelectionCriteria $SelectionCriteria
     * @return self
     */
    public function setSelectionCriteria($SelectionCriteria)
    {
        $this->SelectionCriteria = $SelectionCriteria;
    
        return $this;
    }

    /**
     * @return string[] RetargetingListFieldEnum
     */
    public function getFieldNames()
    {
        return $this->FieldNames;
    }

    /**
     * @param string[] $FieldNames RetargetingListFieldEnum
     * @return self
     */
    public function setFieldNames(array $FieldNames)
    {
        $this->FieldNames = $FieldNames;
    
        return $this;
    }
}
