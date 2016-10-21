<?php

namespace eLama\DirectApiV5\Dto\AdGroup;

use eLama\DirectApiV5\Dto\General\SelectionCriteria;
use eLama\DirectApiV5\Dto\General\StatusEnum;
use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class AdGroupsSelectionCriteria extends SelectionCriteria
{
    /**
     * @JMS\Type("array<integer>")
     *
     * @var int[] $CampaignIds
     */
    protected $CampaignIds;

    /**
     * @JMS\Type("array<integer>")
     *
     * @var int[] $Ids
     */
    private $Ids;

    /**
     * @JMS\Type("array<string>")
     *
     * @var string[]
     * @see AdGroupTypesEnum
     */
    private $Types;

    /**
     * @JMS\Type("array<string>")
     *
     * @var string[]
     * @see StatusEnum
     */
    private $Statuses;

    /**
     * @JMS\Type("array<integer>")
     *
     * @var int[] $TagIds
     */
    private $TagIds;

    /**
     * @JMS\Type("array<string>")
     *
     * @var string[] $Tags
     */
    private $Tags;

    /**
     * @JMS\Type("array<string>")
     *
     * @var string[]
     * @see AdGroupAppIconStatusSelectionEnum
     */
    private $AppIconStatuses;

    /**
     * @return int[]
     */
    public function getIds()
    {
      return $this->Ids;
    }

    /**
     * @param int[] $Ids
     * @return \eLama\DirectApiV5\Dto\AdGroup\AdGroupsSelectionCriteria
     */
    public function setIds(array $Ids = null)
    {
      $this->Ids = $Ids;
      return $this;
    }

    /**
     * @see AdGroupTypesEnum
     * @return string[]
     */
    public function getTypes()
    {
      return $this->Types;
    }

    /**
     * @param AdGroupTypesEnum[] $Types
     * @return \eLama\DirectApiV5\Dto\AdGroup\AdGroupsSelectionCriteria
     */
    public function setTypes(array $Types = null)
    {
      $this->Types = $Types;
      return $this;
    }

    /**
     * @return string[]
     * @see StatusEnum
     */
    public function getStatuses()
    {
      return $this->Statuses;
    }

    /**
     * @see StatusEnum
     * @param string[] $Statuses
     * @return \eLama\DirectApiV5\Dto\AdGroup\AdGroupsSelectionCriteria
     */
    public function setStatuses(array $Statuses = null)
    {
        $this->Statuses = $Statuses;
        return $this;
    }

    /**
     * @return int[]
     */
    public function getTagIds()
    {
      return $this->TagIds;
    }

    /**
     * @param int[] $TagIds
     * @return \eLama\DirectApiV5\Dto\AdGroup\AdGroupsSelectionCriteria
     */
    public function setTagIds(array $TagIds = null)
    {
      $this->TagIds = $TagIds;
      return $this;
    }

    /**
     * @return string[]
     */
    public function getTags()
    {
      return $this->Tags;
    }

    /**
     * @param string[] $Tags
     * @return \eLama\DirectApiV5\Dto\AdGroup\AdGroupsSelectionCriteria
     */
    public function setTags(array $Tags = null)
    {
      $this->Tags = $Tags;
      return $this;
    }

    /**
     * @see AdGroupAppIconStatusSelectionEnum
     * @return string[]
     */
    public function getAppIconStatuses()
    {
      return $this->AppIconStatuses;
    }

    /**
     * @see AdGroupAppIconStatusSelectionEnum
     * @param string[] $AppIconStatuses
     * @return \eLama\DirectApiV5\Dto\AdGroup\AdGroupsSelectionCriteria
     */
    public function setAppIconStatuses(array $AppIconStatuses = null)
    {
      $this->AppIconStatuses = $AppIconStatuses;
      return $this;
    }

}
