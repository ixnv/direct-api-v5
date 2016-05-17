<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class CampaignAssistant
{

    /**
     * @JMS\Type("string")
     *
     * @var string $Manager
     */
    private $Manager;

    /**
     * @JMS\Type("string")
     *
     * @var string $Agency
     */
    private $Agency;

    /**
     * @return string
     */
    public function getManager()
    {
      return $this->Manager;
    }

    /**
     * @param string $Manager
     * @return \eLama\DirectApiV5\Dto\Campaign\CampaignAssistant
     */
    public function setManager($Manager = null)
    {
      $this->Manager = $Manager;
      return $this;
    }

    /**
     * @return string
     */
    public function getAgency()
    {
      return $this->Agency;
    }

    /**
     * @param string $Agency
     * @return \eLama\DirectApiV5\Dto\Campaign\CampaignAssistant
     */
    public function setAgency($Agency = null)
    {
      $this->Agency = $Agency;
      return $this;
    }

}
