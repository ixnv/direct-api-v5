<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use eLama\DirectApiV5\Dto\Campaign\Enum\CampaignFieldEnum;
use eLama\DirectApiV5\Dto\Campaign\Enum\DynamicTextCampaignFieldEnum;
use eLama\DirectApiV5\Dto\Campaign\Enum\MobileAppCampaignFieldEnum;
use eLama\DirectApiV5\Dto\Campaign\Enum\TextCampaignFieldEnum;
use eLama\DirectApiV5\Dto\General\GetRequestGeneral;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class GetRequest extends GetRequestGeneral
{

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\CampaignsSelectionCriteria")
     *
     * @var CampaignsSelectionCriteria $SelectionCriteria
     */
    private $SelectionCriteria;

    /**
     * @JMS\Type("array<string>")
     *
     * @var string[]
     * @see CampaignFieldEnum
     */
    private $FieldNames;

    /**
     * @JMS\Type("array<string>")
     *
     * @var string[]
     * @see TextCampaignFieldEnum
     */
    private $TextCampaignFieldNames;

    /**
     * @JMS\Type("array<string>")
     *
     * @var string[]
     * @see MobileAppCampaignFieldEnum
     */
    private $MobileAppCampaignFieldNames;

    /**
     * @JMS\Type("array<string>")
     *
     * @var string[]
     * @see DynamicTextCampaignFieldEnum
     */
    private $DynamicTextCampaignFieldNames;

    /**
     * @param CampaignsSelectionCriteria $SelectionCriteria
     * @param string[] $FieldNames
     * @param string[] $TextCampaignFieldNames
     * @param string[] $MobileAppCampaignFieldNames
     * @param string[] $DynamicTextCampaignFieldNames
     */
    public function __construct(
        CampaignsSelectionCriteria $SelectionCriteria,
        array $FieldNames,
        array $TextCampaignFieldNames = null,
        array $MobileAppCampaignFieldNames = null,
        array $DynamicTextCampaignFieldNames = null
    ) {
      $this->SelectionCriteria = $SelectionCriteria;
      $this->FieldNames = $FieldNames;
      $this->TextCampaignFieldNames = $TextCampaignFieldNames;
      $this->MobileAppCampaignFieldNames = $MobileAppCampaignFieldNames;
      $this->DynamicTextCampaignFieldNames = $DynamicTextCampaignFieldNames;
    }

    /**
     * @return CampaignsSelectionCriteria
     */
    public function getSelectionCriteria()
    {
      return $this->SelectionCriteria;
    }

    /**
     * @param CampaignsSelectionCriteria $SelectionCriteria
     * @return GetRequestGeneral
     */
    public function setSelectionCriteria(CampaignsSelectionCriteria $SelectionCriteria)
    {
      $this->SelectionCriteria = $SelectionCriteria;
      return $this;
    }

    /**
     * @return CampaignFieldEnum
     */
    public function getFieldNames()
    {
      return $this->FieldNames;
    }

    /**
     * @param CampaignFieldEnum $FieldNames
     * @return GetRequestGeneral
     */
    public function setFieldNames($FieldNames)
    {
      $this->FieldNames = $FieldNames;
      return $this;
    }

    /**
     * @return TextCampaignFieldEnum
     */
    public function getTextCampaignFieldNames()
    {
      return $this->TextCampaignFieldNames;
    }

    /**
     * @param TextCampaignFieldEnum $TextCampaignFieldNames
     * @return GetRequestGeneral
     */
    public function setTextCampaignFieldNames($TextCampaignFieldNames)
    {
      $this->TextCampaignFieldNames = $TextCampaignFieldNames;
      return $this;
    }

    /**
     * @return MobileAppCampaignFieldEnum
     */
    public function getMobileAppCampaignFieldNames()
    {
      return $this->MobileAppCampaignFieldNames;
    }

    /**
     * @param MobileAppCampaignFieldEnum $MobileAppCampaignFieldNames
     * @return GetRequestGeneral
     */
    public function setMobileAppCampaignFieldNames($MobileAppCampaignFieldNames)
    {
      $this->MobileAppCampaignFieldNames = $MobileAppCampaignFieldNames;
      return $this;
    }

    /**
     * @return DynamicTextCampaignFieldEnum
     */
    public function getDynamicTextCampaignFieldNames()
    {
      return $this->DynamicTextCampaignFieldNames;
    }

    /**
     * @param DynamicTextCampaignFieldEnum $DynamicTextCampaignFieldNames
     * @return GetRequestGeneral
     */
    public function setDynamicTextCampaignFieldNames($DynamicTextCampaignFieldNames)
    {
      $this->DynamicTextCampaignFieldNames = $DynamicTextCampaignFieldNames;
      return $this;
    }

}
