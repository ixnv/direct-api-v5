<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class CampaignFundsParam
{

    /**
     * @JMS\Type("integer")
     *
     * @var int $Sum
     */
    private $Sum;

    /**
     * @JMS\Type("integer")
     *
     * @var int $Balance
     */
    private $Balance;

    /**
     * @JMS\Type("integer")
     *
     * @var int $BalanceBonus
     */
    private $BalanceBonus;

    /**
     * @JMS\Type("integer")
     *
     * @var int $SumAvailableForTransfer
     */
    private $SumAvailableForTransfer;

    /**
     * @param int $Sum
     * @param int $Balance
     * @param int $BalanceBonus
     */
    public function __construct($Sum = null, $Balance = null, $BalanceBonus = null)
    {
      $this->Sum = $Sum;
      $this->Balance = $Balance;
      $this->BalanceBonus = $BalanceBonus;
    }

    /**
     * @return int
     */
    public function getSum()
    {
      return $this->Sum;
    }

    /**
     * @param int $Sum
     * @return \eLama\DirectApiV5\Dto\Campaign\CampaignFundsParam
     */
    public function setSum($Sum)
    {
      $this->Sum = $Sum;
      return $this;
    }

    /**
     * @return int
     */
    public function getBalance()
    {
      return $this->Balance;
    }

    /**
     * @param int $Balance
     * @return \eLama\DirectApiV5\Dto\Campaign\CampaignFundsParam
     */
    public function setBalance($Balance)
    {
      $this->Balance = $Balance;
      return $this;
    }

    /**
     * @return int
     */
    public function getBalanceBonus()
    {
      return $this->BalanceBonus;
    }

    /**
     * @param int $BalanceBonus
     * @return \eLama\DirectApiV5\Dto\Campaign\CampaignFundsParam
     */
    public function setBalanceBonus($BalanceBonus)
    {
      $this->BalanceBonus = $BalanceBonus;
      return $this;
    }

    /**
     * @return int
     */
    public function getSumAvailableForTransfer()
    {
      return $this->SumAvailableForTransfer;
    }

    /**
     * @param int $SumAvailableForTransfer
     * @return \eLama\DirectApiV5\Dto\Campaign\CampaignFundsParam
     */
    public function setSumAvailableForTransfer($SumAvailableForTransfer = null)
    {
      $this->SumAvailableForTransfer = $SumAvailableForTransfer;
      return $this;
    }

}
