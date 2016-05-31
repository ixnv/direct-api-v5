<?php

namespace eLama\DirectApiV5\Dto\Changes;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class CampaignChangesItem
{

    /**
     * @JMS\Type("integer")
     *
     * @var int $CampaignId
     */
    private $CampaignId;

    /**
     * @JMS\Type("array<string>")
     *
     * @var CampaignChangesInEnum[] $ChangesIn
     */
    private $ChangesIn;

    /**
     * @param int $CampaignId
     * @param CampaignChangesInEnum[] $ChangesIn
     */
    public function __construct($CampaignId = null, array $ChangesIn = null)
    {
      $this->CampaignId = $CampaignId;
      $this->ChangesIn = $ChangesIn;
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
     * @return \eLama\DirectApiV5\Dto\Changes\CampaignChangesItem
     */
    public function setCampaignId($CampaignId)
    {
      $this->CampaignId = $CampaignId;
      return $this;
    }

    /**
     * @return CampaignChangesInEnum[]
     */
    public function getChangesIn()
    {
      return $this->ChangesIn;
    }

    /**
     * @param CampaignChangesInEnum[] $ChangesIn
     * @return \eLama\DirectApiV5\Dto\Changes\CampaignChangesItem
     */
    public function setChangesIn(array $ChangesIn)
    {
      $this->ChangesIn = $ChangesIn;
      return $this;
    }

}
