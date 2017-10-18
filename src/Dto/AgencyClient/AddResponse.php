<?php

namespace eLama\DirectApiV5\AgencyClient;

use eLama\DirectApiV5\Dto\General\ActionResultBase;

class AddResponse extends ActionResultBase
{
    /**
     * @var string $Login
     */
    protected $Login;

    /**
     * @var string $Password
     */
    protected $Password;

    /**
     * @var string $Email
     */
    protected $Email;

    /**
     * @var int $ClientId
     */
    protected $ClientId;

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
    public function getPassword()
    {
        return $this->Password;
    }

    /**
     * @param string $Password
     * @return self
     */
    public function setPassword($Password)
    {
        $this->Password = $Password;
    
        return $this;
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
     * @return int
     */
    public function getClientId()
    {
        return $this->ClientId;
    }

    /**
     * @param int $ClientId
     * @return self
     */
    public function setClientId($ClientId)
    {
        $this->ClientId = $ClientId;
    
        return $this;
    }
}
