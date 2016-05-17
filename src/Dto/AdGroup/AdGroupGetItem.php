<?php

namespace eLama\DirectApiV5\Dto\AdGroup;

use eLama\DirectApiV5\Dto\General\StatusEnum;
use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class AdGroupGetItem extends AdGroupBase
{

    /**
     * @JMS\Type("integer")
     *
     * @var int $Id
     */
    private $Id;

    /**
     * @JMS\Type("string")
     *
     * @var string $Name
     */
    private $Name;

    /**
     * @JMS\Type("integer")
     *
     * @var int $CampaignId
     */
    private $CampaignId;

    /**
     * @JMS\Type("string")
     *
     * @var StatusEnum $Status
     */
    private $Status;

    /**
     * @JMS\Type("string")
     *
     * @var AdGroupTypesEnum $Type
     */
    private $Type;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\AdGroup\MobileAppAdGroupGet")
     *
     * @var MobileAppAdGroupGet $MobileAppAdGroup
     */
    private $MobileAppAdGroup;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\AdGroup\DynamicTextAdGroupGet")
     *
     * @var DynamicTextAdGroupGet $DynamicTextAdGroup
     */
    private $DynamicTextAdGroup;

    /**
     * @return int
     */
    public function getId()
    {
      return $this->Id;
    }

    /**
     * @param int $Id
     * @return \eLama\DirectApiV5\Dto\AdGroup\AdGroupGetItem
     */
    public function setId($Id = null)
    {
      $this->Id = $Id;
      return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
      return $this->Name;
    }

    /**
     * @param string $Name
     * @return \eLama\DirectApiV5\Dto\AdGroup\AdGroupGetItem
     */
    public function setName($Name = null)
    {
      $this->Name = $Name;
      return $this;
    }

    /**
     * @return int
     */
    public function getCampaignId()
    {
      return $this->CampaignId;
    }

    /**
     * @param int $CampaignId
     * @return \eLama\DirectApiV5\Dto\AdGroup\AdGroupGetItem
     */
    public function setCampaignId($CampaignId = null)
    {
      $this->CampaignId = $CampaignId;
      return $this;
    }

    /**
     * @return StatusEnum
     */
    public function getStatus()
    {
      return $this->Status;
    }

    /**
     * @param StatusEnum $Status
     * @return \eLama\DirectApiV5\Dto\AdGroup\AdGroupGetItem
     */
    public function setStatus($Status = null)
    {
      $this->Status = $Status;
      return $this;
    }

    /**
     * @return AdGroupTypesEnum
     */
    public function getType()
    {
      return $this->Type;
    }

    /**
     * @param AdGroupTypesEnum $Type
     * @return \eLama\DirectApiV5\Dto\AdGroup\AdGroupGetItem
     */
    public function setType($Type = null)
    {
      $this->Type = $Type;
      return $this;
    }

    /**
     * @return MobileAppAdGroupGet
     */
    public function getMobileAppAdGroup()
    {
      return $this->MobileAppAdGroup;
    }

    /**
     * @param MobileAppAdGroupGet $MobileAppAdGroup
     * @return \eLama\DirectApiV5\Dto\AdGroup\AdGroupGetItem
     */
    public function setMobileAppAdGroup(MobileAppAdGroupGet $MobileAppAdGroup = null)
    {
      $this->MobileAppAdGroup = $MobileAppAdGroup;
      return $this;
    }

    /**
     * @return DynamicTextAdGroupGet
     */
    public function getDynamicTextAdGroup()
    {
      return $this->DynamicTextAdGroup;
    }

    /**
     * @param DynamicTextAdGroupGet $DynamicTextAdGroup
     * @return \eLama\DirectApiV5\Dto\AdGroup\AdGroupGetItem
     */
    public function setDynamicTextAdGroup(DynamicTextAdGroupGet $DynamicTextAdGroup = null)
    {
      $this->DynamicTextAdGroup = $DynamicTextAdGroup;
      return $this;
    }

}
