<?php

namespace eLama\DirectApiV5\Dto\AdGroup;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class AdGroupUpdateItem extends AdGroupBase
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
     * @JMS\Type("eLama\DirectApiV5\Dto\AdGroup\MobileAppAdGroupUpdate")
     *
     * @var MobileAppAdGroupUpdate $MobileAppAdGroup
     */
    private $MobileAppAdGroup;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\AdGroup\DynamicTextAdGroup")
     *
     * @var DynamicTextAdGroup $DynamicTextAdGroup
     */
    private $DynamicTextAdGroup;

    /**
     * @param int $Id
     */
    public function __construct($Id = null)
    {
      parent::__construct();
      $this->Id = $Id;
    }

    /**
     * @return int
     */
    public function getId()
    {
      return $this->Id;
    }

    /**
     * @param int $Id
     * @return \eLama\DirectApiV5\Dto\AdGroup\AdGroupUpdateItem
     */
    public function setId($Id)
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
     * @return \eLama\DirectApiV5\Dto\AdGroup\AdGroupUpdateItem
     */
    public function setName($Name = null)
    {
      $this->Name = $Name;
      return $this;
    }

    /**
     * @return MobileAppAdGroupUpdate
     */
    public function getMobileAppAdGroup()
    {
      return $this->MobileAppAdGroup;
    }

    /**
     * @param MobileAppAdGroupUpdate $MobileAppAdGroup
     * @return \eLama\DirectApiV5\Dto\AdGroup\AdGroupUpdateItem
     */
    public function setMobileAppAdGroup(MobileAppAdGroupUpdate $MobileAppAdGroup = null)
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
     * @return \eLama\DirectApiV5\Dto\AdGroup\AdGroupUpdateItem
     */
    public function setDynamicTextAdGroup(DynamicTextAdGroup $DynamicTextAdGroup = null)
    {
      $this->DynamicTextAdGroup = $DynamicTextAdGroup;
      return $this;
    }

}
