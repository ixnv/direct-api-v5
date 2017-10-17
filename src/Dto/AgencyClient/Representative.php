<?php

namespace eLama\DirectApiV5\Dto\AgencyClient;

use JMS\Serializer\Annotation as JMS;

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
     *
     * @var string $Role
     */
    private $Role;

    /**
     * @param string $email
     * @param string $login
     * @param string $role
     */
    public function __construct($email, $login, $role)
    {
        $this->Email = $email;
        $this->Login = $login;
        $this->Role = $role;
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
     * @return self
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
     * @return self
     */
    public function setLogin($Login)
    {
        $this->Login = $Login;
    
        return $this;
    }

    /**
     * @return string
     */
    public function getRole()
    {
        return $this->Role;
    }

    /**
     * @param string $Role
     * @return self
     */
    public function setRole($Role)
    {
        $this->Role = $Role;
    
        return $this;
    }
}
