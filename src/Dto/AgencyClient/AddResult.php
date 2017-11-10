<?php

namespace eLama\DirectApiV5\Dto\AgencyClient;

use eLama\DirectApiV5\Dto\General\ExceptionNotification;
use JMS\Serializer\Annotation as JMS;

class AddResult
{
    /**
     * @JMS\Type("string")
     *
     * @var string $Login
     */
    private $Login;

    /**
     * @JMS\Type("string")
     *
     * @var string $Password
     */
    private $Password;

    /**
     * @JMS\Type("string")
     *
     * @var string $Email
     */
    private $Email;

    /**
     * @JMS\Type("integer")
     *
     * @var int $ClientId
     */
    private $ClientId;

    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\General\ExceptionNotification>")
     *
     * @var ExceptionNotification[] $Warnings
     */
    private $Warnings = [];

    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\General\ExceptionNotification>")
     *
     * @var ExceptionNotification[] $Errors
     */
    private $Errors = [];

    /**
     * @return ExceptionNotification[]
     */
    public function getWarnings()
    {
        return $this->Warnings;
    }

    /**
     * @param ExceptionNotification[] $Warnings
     * @return self
     */
    public function setWarnings(array $Warnings = [])
    {
        $this->Warnings = $Warnings;

        return $this;
    }

    /**
     * @return ExceptionNotification[]
     */
    public function getErrors()
    {
        return $this->Errors;
    }

    /**
     * @param ExceptionNotification[] $Errors
     * @return self
     */
    public function setErrors(array $Errors = [])
    {
        $this->Errors = $Errors;

        return $this;
    }

    /**
     * @JMS\Type("string")
     *
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
