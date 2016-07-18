<?php

namespace eLama\DirectApiV5\Dto\AdGroup;

use JMS\Serializer\Annotation as JMS;
use eLama\DirectApiV5\Dto\General\GetRequestGeneral;

/**
 * @JMS\AccessType("public_method")
 */
class GetRequest extends GetRequestGeneral
{

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\AdGroup\AdGroupsSelectionCriteria")
     *
     * @var AdGroupsSelectionCriteria $SelectionCriteria
     */
    private $SelectionCriteria;

    /**
     * @JMS\Type("array<string>")
     *
     * @var string[]
     *
     */
    private $FieldNames;

    /**
     * @JMS\Type("array<string>")
     *
     * @var string[]
     */
    private $MobileAppAdGroupFieldNames;

    /**
     * @JMS\Type("array<string>")
     *
     * @var string[]
     */
    private $DynamicTextAdGroupFieldNames;

    /**
     * @param AdGroupsSelectionCriteria $SelectionCriteria
     * @param string[] $FieldNames
     * @param string[] $MobileAppAdGroupFieldNames
     * @param string[] $DynamicTextAdGroupFieldNames
     */
    public function __construct (
        AdGroupsSelectionCriteria $SelectionCriteria = null,
        array $FieldNames = null,
        array $MobileAppAdGroupFieldNames = null,
        array $DynamicTextAdGroupFieldNames = null
    ) {
      $this->SelectionCriteria = $SelectionCriteria;
      $this->FieldNames = $FieldNames;
      $this->MobileAppAdGroupFieldNames = $MobileAppAdGroupFieldNames;
      $this->DynamicTextAdGroupFieldNames = $DynamicTextAdGroupFieldNames;
    }

    /**
     * @return AdGroupsSelectionCriteria
     */
    public function getSelectionCriteria()
    {
      return $this->SelectionCriteria;
    }

    /**
     * @param AdGroupsSelectionCriteria $SelectionCriteria
     * @return \eLama\DirectApiV5\Dto\AdGroup\GetRequest
     */
    public function setSelectionCriteria(AdGroupsSelectionCriteria $SelectionCriteria)
    {
      $this->SelectionCriteria = $SelectionCriteria;
      return $this;
    }

    /**
     * @return AdGroupFieldEnum
     */
    public function getFieldNames()
    {
      return $this->FieldNames;
    }

    /**
     * @param string[] $FieldNames
     * @return \eLama\DirectApiV5\Dto\AdGroup\GetRequest
     */
    public function setFieldNames(array $FieldNames)
    {
      $this->FieldNames = $FieldNames;
      return $this;
    }

    /**
     * @return MobileAppAdGroupFieldEnum
     */
    public function getMobileAppAdGroupFieldNames()
    {
      return $this->MobileAppAdGroupFieldNames;
    }

    /**
     * @param string[] $MobileAppAdGroupFieldNames
     * @return \eLama\DirectApiV5\Dto\AdGroup\GetRequest
     */
    public function setMobileAppAdGroupFieldNames(array $MobileAppAdGroupFieldNames)
    {
      $this->MobileAppAdGroupFieldNames = $MobileAppAdGroupFieldNames;
      return $this;
    }

    /**
     * @return DynamicTextAdGroupFieldEnum
     */
    public function getDynamicTextAdGroupFieldNames()
    {
      return $this->DynamicTextAdGroupFieldNames;
    }

    /**
     * @param string[] $DynamicTextAdGroupFieldNames
     * @return GetRequest
     */
    public function setDynamicTextAdGroupFieldNames(array $DynamicTextAdGroupFieldNames)
    {
      $this->DynamicTextAdGroupFieldNames = $DynamicTextAdGroupFieldNames;
      return $this;
    }

}
