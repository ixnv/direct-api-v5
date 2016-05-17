<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class CampaignsSelectionCriteria
{

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
     * @see CampaignTypeEnum
     */
    private $Types;

    /**
     * @JMS\Type("array<string>")
     *
     * @var string[]
     * @see CampaignStateEnum
     */
    private $States;

    /**
     * @JMS\Type("array<string>")
     *
     * @var string[]
     * @see CampaignStatusEnum
     */
    private $Statuses;

    /**
     * @JMS\Type("array<string>")
     *
     * @var string[]
     * @see CampaignStatusPaymentEnum
     */
    private $StatusesPayment;

    /**
     * @return int[]
     */
    public function getIds()
    {
      return $this->Ids;
    }

    /**
     * @param int[] $Ids
     * @return \eLama\DirectApiV5\Dto\Campaign\CampaignsSelectionCriteria
     */
    public function setIds(array $Ids)
    {
      $this->Ids = $Ids;
      return $this;
    }

    /**
     * @return string[]
     * @see CampaignTypeEnum
     */
    public function getTypes()
    {
      return $this->Types;
    }

    /**
     * @param string[] $Types
     * @see CampaignTypeEnum
     * @return \eLama\DirectApiV5\Dto\Campaign\CampaignsSelectionCriteria
     */
    public function setTypes(array $Types = null)
    {
      $this->Types = $Types;
      return $this;
    }

    /**
     * @return string[]
     * @see CampaignStateEnum
     */
    public function getStates()
    {
      return $this->States;
    }

    /**
     * @param string[] $States
     * @see CampaignStateEnum
     * @return \eLama\DirectApiV5\Dto\Campaign\CampaignsSelectionCriteria
     */
    public function setStates(array $States = null)
    {
      $this->States = $States;
      return $this;
    }

    /**
     * @return string[]
     * @see CampaignStatusEnum
     */
    public function getStatuses()
    {
      return $this->Statuses;
    }

    /**
     * @param string[] $Statuses
     * @see CampaignStatusEnum
     * @return \eLama\DirectApiV5\Dto\Campaign\CampaignsSelectionCriteria
     */
    public function setStatuses(array $Statuses = null)
    {
      $this->Statuses = $Statuses;
      return $this;
    }

    /**
     * @return string[]
     * @see CampaignStatusPaymentEnum
     */
    public function getStatusesPayment()
    {
      return $this->StatusesPayment;
    }

    /**
     * @param string[] $StatusesPayment
     * @see CampaignStatusPaymentEnum
     * @return \eLama\DirectApiV5\Dto\Campaign\CampaignsSelectionCriteria
     */
    public function setStatusesPayment(array $StatusesPayment = null)
    {
      $this->StatusesPayment = $StatusesPayment;
      return $this;
    }

}
