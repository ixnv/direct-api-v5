<?php

namespace eLama\DirectApiV5\Dto\Client;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class Representative
{

    /**
     * @JMS\Type("string")
     *
     * @var string $Email
     */
    private $Email;

    /**
     * @JMS\Type("string")
     *
     * @var string $Login
     */
    private $Login;

    /**
     * @JMS\Type("string")
     * @see RepresentativeRoleEnum
     * @var string $Role
     */
    private $Role;

    /**
     * @param string $Email
     * @param string $Login
     * @param string $Role
     */
    public function __construct($Email = null, $Login = null, $Role = null)
    {
        $this->Email = $Email;
        $this->Login = $Login;
        $this->Role = $Role;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->Email;
    }

    /**
     * @param string $Email
     * @return \eLama\DirectApiV5\Dto\Client\Representative
     */
    public function setEmail($Email)
    {
        $this->Email = $Email;
        return $this;
    }

    /**
     * @return string
     */
    public function getLogin()
    {
        return $this->Login;
    }

    /**
     * @param string $Login
     * @return \eLama\DirectApiV5\Dto\Client\Representative
     */
    public function setLogin($Login)
    {
        $this->Login = $Login;
        return $this;
    }

    /**
     * @see RepresentativeRoleEnum
     * @return string
     */
    public function getRole()
    {
        return $this->Role;
    }

    /**
     * @see RepresentativeRoleEnum
     * @param string $Role
     * @return \eLama\DirectApiV5\Dto\Client\Representative
     */
    public function setRole($Role)
    {
        $this->Role = $Role;
        return $this;
    }
}
