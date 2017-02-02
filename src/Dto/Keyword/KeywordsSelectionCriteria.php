<?php

namespace eLama\DirectApiV5\Dto\Keyword;

use eLama\DirectApiV5\Dto\General\Enum\StatusEnum;
use eLama\DirectApiV5\Dto\General\SelectionCriteria;
use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class KeywordsSelectionCriteria extends SelectionCriteria
{
    /**
     * @JMS\Type("array<integer>")
     *
     * @var int[] $Ids
     */
    private $Ids;

    /**
     * @JMS\Type("array<integer>")
     *
     * @var int[] $AdGroupIds
     */
    private $AdGroupIds;

    /**
     * @JMS\Type("array<integer>")
     *
     * @var int[] $CampaignIds
     */
    protected $CampaignIds;

    /**
     * @JMS\Type("array<string>")
     *
     * @see StateEnum
     * @var string[] $States
     */
    private $States;

    /**
     * @JMS\Type("array<string>")
     *
     * @see StatusEnum
     * @var string[]
     */
    private $Statuses;

    /**
     * @return int[]
     */
    public function getIds()
    {
      return $this->Ids;
    }

    /**
     * @param int[] $Ids
     * @return \eLama\DirectApiV5\Dto\Keyword\KeywordsSelectionCriteria
     */
    public function setIds(array $Ids = null)
    {
      $this->Ids = $Ids;
      return $this;
    }

    /**
     * @return int[]
     */
    public function getAdGroupIds()
    {
      return $this->AdGroupIds;
    }

    /**
     * @param int[] $AdGroupIds
     * @return \eLama\DirectApiV5\Dto\Keyword\KeywordsSelectionCriteria
     */
    public function setAdGroupIds(array $AdGroupIds = null)
    {
      $this->AdGroupIds = $AdGroupIds;
      return $this;
    }

    /**
     * @see StateEnum
     * @return string[]
     */
    public function getStates()
    {
        return $this->States;
    }

    /**
     * @see KeywordStateEnum
     * @param string[] $States
     * @return \eLama\DirectApiV5\Dto\Keyword\KeywordsSelectionCriteria
     */
    public function setStates(array $States = null)
    {
      $this->States = $States;
      return $this;
    }

    /**
     * @return StatusEnum[]
     */
    public function getStatuses()
    {
      return $this->Statuses;
    }

    /**
     * @param StatusEnum[] $Statuses
     * @return \eLama\DirectApiV5\Dto\Keyword\KeywordsSelectionCriteria
     */
    public function setStatuses(array $Statuses = null)
    {
      $this->Statuses = $Statuses;
      return $this;
    }

}
