<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use eLama\DirectApiV5\Dto\Campaign\Enum\CampaignFundsEnum;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class FundsParam
{

    /**
     * @JMS\Type("string")
     *
     * @var CampaignFundsEnum $Mode
     */
    private $Mode;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\CampaignFundsParam")
     *
     * @var CampaignFundsParam $CampaignFunds
     */
    private $CampaignFunds;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\SharedAccountFundsParam")
     *
     * @var SharedAccountFundsParam $SharedAccountFunds
     */
    private $SharedAccountFunds;

    /**
     * @param CampaignFundsEnum $Mode
     */
    public function __construct($Mode = null)
    {
      $this->Mode = $Mode;
    }

    /**
     * @return CampaignFundsEnum
     */
    public function getMode()
    {
      return $this->Mode;
    }

    /**
     * @param CampaignFundsEnum $Mode
     * @return \eLama\DirectApiV5\Dto\Campaign\FundsParam
     */
    public function setMode($Mode)
    {
      $this->Mode = $Mode;
      return $this;
    }

    /**
     * @return CampaignFundsParam
     */
    public function getCampaignFunds()
    {
      return $this->CampaignFunds;
    }

    /**
     * @param CampaignFundsParam $CampaignFunds
     * @return \eLama\DirectApiV5\Dto\Campaign\FundsParam
     */
    public function setCampaignFunds(CampaignFundsParam $CampaignFunds = null)
    {
      $this->CampaignFunds = $CampaignFunds;
      return $this;
    }

    /**
     * @return SharedAccountFundsParam
     */
    public function getSharedAccountFunds()
    {
      return $this->SharedAccountFunds;
    }

    /**
     * @param SharedAccountFundsParam $SharedAccountFunds
     * @return \eLama\DirectApiV5\Dto\Campaign\FundsParam
     */
    public function setSharedAccountFunds(SharedAccountFundsParam $SharedAccountFunds = null)
    {
      $this->SharedAccountFunds = $SharedAccountFunds;
      return $this;
    }

}
