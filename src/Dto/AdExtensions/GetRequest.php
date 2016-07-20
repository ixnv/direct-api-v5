<?php

namespace eLama\DirectApiV5\Dto\AdExtensions;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class GetRequest
{

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\AdExtensions\AdExtensionsSelectionCriteria")
     *
     * @var AdExtensionsSelectionCriteria $SelectionCriteria
     */
    private $SelectionCriteria;

    /**
     * @JMS\Type("array<string>")
     *
     * @var AdExtensionFieldEnum $FieldNames
     */
    private $FieldNames;

    /**
     * @JMS\Type("array<string>")
     *
     * @var CalloutFieldEnum $CalloutFieldNames
     */
    private $CalloutFieldNames;

    /**
     * @param AdExtensionsSelectionCriteria $SelectionCriteria
     * @param AdExtensionFieldEnum $FieldNames
     * @param CalloutFieldEnum $CalloutFieldNames
     */
    public function __construct(AdExtensionsSelectionCriteria $SelectionCriteria = null, $FieldNames = null, $CalloutFieldNames = null)
    {
      $this->SelectionCriteria = $SelectionCriteria;
      $this->FieldNames = $FieldNames;
      $this->CalloutFieldNames = $CalloutFieldNames;
    }

    /**
     * @return AdExtensionsSelectionCriteria
     */
    public function getSelectionCriteria()
    {
      return $this->SelectionCriteria;
    }

    /**
     * @param AdExtensionsSelectionCriteria $SelectionCriteria
     * @return \eLama\DirectApiV5\Dto\AdExtensions\GetRequest
     */
    public function setSelectionCriteria(AdExtensionsSelectionCriteria $SelectionCriteria)
    {
      $this->SelectionCriteria = $SelectionCriteria;
      return $this;
    }

    /**
     * @return AdExtensionFieldEnum
     */
    public function getFieldNames()
    {
      return $this->FieldNames;
    }

    /**
     * @param AdExtensionFieldEnum $FieldNames
     * @return \eLama\DirectApiV5\Dto\AdExtensions\GetRequest
     */
    public function setFieldNames($FieldNames)
    {
      $this->FieldNames = $FieldNames;
      return $this;
    }

    /**
     * @return CalloutFieldEnum
     */
    public function getCalloutFieldNames()
    {
      return $this->CalloutFieldNames;
    }

    /**
     * @param CalloutFieldEnum $CalloutFieldNames
     * @return \eLama\DirectApiV5\Dto\AdExtensions\GetRequest
     */
    public function setCalloutFieldNames($CalloutFieldNames)
    {
      $this->CalloutFieldNames = $CalloutFieldNames;
      return $this;
    }

}
