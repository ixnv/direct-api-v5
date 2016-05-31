<?php

namespace eLama\DirectApiV5\Dto\Changes;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class CampaignStatItem
{

    /**
     * @JMS\Type("integer")
     *
     * @var int $CampaignId
     */
    private $CampaignId;

    /**
     * @JMS\Type("string")
     *
     * @var string $BorderDate
     */
    private $BorderDate;

    /**
     * @param int $CampaignId
     * @param string $BorderDate
     */
    public function __construct($CampaignId = null, $BorderDate = null)
    {
      $this->CampaignId = $CampaignId;
      $this->BorderDate = $BorderDate;
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
     * @return \eLama\DirectApiV5\Dto\Changes\CampaignStatItem
     */
    public function setCampaignId($CampaignId)
    {
      $this->CampaignId = $CampaignId;
      return $this;
    }

    /**
     * @return string
     */
    public function getBorderDate()
    {
      return $this->BorderDate;
    }

    /**
     * @param string $BorderDate
     * @return \eLama\DirectApiV5\Dto\Changes\CampaignStatItem
     */
    public function setBorderDate($BorderDate)
    {
      $this->BorderDate = $BorderDate;
      return $this;
    }

}
