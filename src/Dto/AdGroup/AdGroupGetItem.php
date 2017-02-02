<?php

namespace eLama\DirectApiV5\Dto\AdGroup;

use eLama\DirectApiV5\Dto\AdGroup\Enum\AdGroupTypesEnum;
use eLama\DirectApiV5\Dto\General\Enum\StatusEnum;
use eLama\DirectApiV5\Dto\AdGroup\Enum\ServingStatusEnum;
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
     * @JMS\Type("string")
     *
     * @var ServingStatusEnum $ServingStatus
     */
    private $ServingStatus;

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
     * @see StatusEnum
     * @return string
     */
    public function getStatus()
    {
        return $this->Status;
    }

    /**
     * @see StatusEnum
     * @param string|null $Status
     * @return \eLama\DirectApiV5\Dto\AdGroup\AdGroupGetItem
     */
    public function setStatus($Status = null)
    {
        $this->Status = $Status;

        return $this;
    }

    /**
     * @see AdGroupTypesEnum
     * @return string
     */
    public function getType()
    {
        return $this->Type;
    }

    /**
     * @see AdGroupTypesEnum
     * @param string|null $Type
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

    /**
     * @see ServingStatusEnum
     * @return string
     */
    public function getServingStatus()
    {
        return $this->ServingStatus;
    }

    /**
     * @see ServingStatusEnum
     * @param string|null $ServingStatus
     * @return \eLama\DirectApiV5\Dto\AdGroup\AdGroupGetItem
     */
    public function setServingStatus($ServingStatus = null)
    {
        $this->ServingStatus = $ServingStatus;

        return $this;
    }
}
