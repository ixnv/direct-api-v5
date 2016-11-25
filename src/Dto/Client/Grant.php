<?php

namespace eLama\DirectApiV5\Dto\Client;

use eLama\DirectApiV5\Dto\General\Enum\YesNoEnum;
use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class Grant
{

    /**
     * @JMS\Type("string")
     *
     * @var string $Agency
     */
    private $Agency;

    /**
     * @JMS\Type("string")
     * @see PrivilegeEnum
     * @var string $Privilege
     */
    private $Privilege;

    /**
     * @JMS\Type("string")
     * @see YesNoEnum
     * @var string $Value
     */
    private $Value;

    /**
     * @see PrivilegeEnum
     * @param string $Privilege
     * @param YesNoEnum $Value
     */
    public function __construct($Privilege = null, $Value = null)
    {
      $this->Privilege = $Privilege;
      $this->Value = $Value;
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
     * @return \eLama\DirectApiV5\Dto\Client\Grant
     */
    public function setAgency($Agency = null)
    {
      $this->Agency = $Agency;
      return $this;
    }

    /**
     * @see PrivilegeEnum
     * @return string
     */
    public function getPrivilege()
    {
      return $this->Privilege;
    }

    /**
     * @see PrivilegeEnum
     * @param string $Privilege
     * @return \eLama\DirectApiV5\Dto\Client\Grant
     */
    public function setPrivilege($Privilege)
    {
      $this->Privilege = $Privilege;
      return $this;
    }

    /**
     * @see YesNoEnum
     * @return string
     */
    public function getValue()
    {
      return $this->Value;
    }

    /**
     * @see YesNoEnum
     * @param string $Value
     * @return \eLama\DirectApiV5\Dto\Client\Grant
     */
    public function setValue($Value)
    {
      $this->Value = $Value;
      return $this;
    }

}
