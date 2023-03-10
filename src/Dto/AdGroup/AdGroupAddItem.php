<?php

namespace eLama\DirectApiV5\Dto\AdGroup;

use eLama\DirectApiV5\Dto\General\ArrayOfString;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class AdGroupAddItem
{

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
     * @JMS\Type("array<integer>")
     *
     * @var int[] $RegionIds
     */
    private $RegionIds;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\General\ArrayOfString")
     *
     * @var ArrayOfString $NegativeKeywords
     */
    private $NegativeKeywords;

    /**
     * @JMS\Type("string")
     *
     * @var string $TrackingParams
     */
    private $TrackingParams;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\AdGroup\MobileAppAdGroupAdd")
     *
     * @var MobileAppAdGroupAdd $MobileAppAdGroup
     */
    private $MobileAppAdGroup;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\AdGroup\DynamicTextAdGroup")
     *
     * @var DynamicTextAdGroup $DynamicTextAdGroup
     */
    private $DynamicTextAdGroup;

    /**
     * @param string $Name
     * @param int $CampaignId
     * @param int[] $RegionIds
     */
    public function __construct($Name, $CampaignId, array $RegionIds)
    {
      $this->Name = $Name;
      $this->CampaignId = $CampaignId;
      $this->RegionIds = $RegionIds;
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
     * @return \eLama\DirectApiV5\Dto\AdGroup\AdGroupAddItem
     */
    public function setName($Name)
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
     * @return \eLama\DirectApiV5\Dto\AdGroup\AdGroupAddItem
     */
    public function setCampaignId($CampaignId)
    {
      $this->CampaignId = $CampaignId;
      return $this;
    }

    /**
     * @return int[]
     */
    public function getRegionIds()
    {
      return $this->RegionIds;
    }

    /**
     * @param int[] $RegionIds
     * @return \eLama\DirectApiV5\Dto\AdGroup\AdGroupAddItem
     */
    public function setRegionIds(array $RegionIds)
    {
      $this->RegionIds = $RegionIds;
      return $this;
    }

    /**
     * @return ArrayOfString
     */
    public function getNegativeKeywords()
    {
      return $this->NegativeKeywords;
    }

    /**
     * @param ArrayOfString $NegativeKeywords
     * @return \eLama\DirectApiV5\Dto\AdGroup\AdGroupAddItem
     */
    public function setNegativeKeywords(ArrayOfString $NegativeKeywords)
    {
      $this->NegativeKeywords = $NegativeKeywords;
      return $this;
    }

    /**
     * @return string
     */
    public function getTrackingParams()
    {
      return $this->TrackingParams;
    }

    /**
     * @param string $TrackingParams
     * @return \eLama\DirectApiV5\Dto\AdGroup\AdGroupAddItem
     */
    public function setTrackingParams($TrackingParams)
    {
      $this->TrackingParams = $TrackingParams;
      return $this;
    }

    /**
     * @return MobileAppAdGroupAdd
     */
    public function getMobileAppAdGroup()
    {
      return $this->MobileAppAdGroup;
    }

    /**
     * @param MobileAppAdGroupAdd $MobileAppAdGroup
     * @return \eLama\DirectApiV5\Dto\AdGroup\AdGroupAddItem
     */
    public function setMobileAppAdGroup(MobileAppAdGroupAdd $MobileAppAdGroup)
    {
      $this->MobileAppAdGroup = $MobileAppAdGroup;
      return $this;
    }

    /**
     * @return DynamicTextAdGroup
     */
    public function getDynamicTextAdGroup()
    {
      return $this->DynamicTextAdGroup;
    }

    /**
     * @param DynamicTextAdGroup $DynamicTextAdGroup
     * @return \eLama\DirectApiV5\Dto\AdGroup\AdGroupAddItem
     */
    public function setDynamicTextAdGroup(DynamicTextAdGroup $DynamicTextAdGroup)
    {
      $this->DynamicTextAdGroup = $DynamicTextAdGroup;
      return $this;
    }

}
