<?php

namespace eLama\DirectApiV5\AgencyClient;

class AddResponse extends \eLama\DirectApiV5\General\ActionResultBase
{
    /**
     * @var string $login
     */
    protected $login;

    /**
     * @var string $password
     */
    protected $password;

    /**
     * @var string $email
     */
    protected $email;

    /**
     * @var int $clientId
     */
    protected $clientId;

    /**
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param string $login
     * @return self
     */
    public function setLogin($login)
    {
        $this->login = $login;
    
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return self
     */
    public function setPassword($password)
    {
        $this->password = $password;
    
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return self
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * @return int
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * @param int $clientId
     * @return self
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;
    
        return $this;
    }
}
