<?php

namespace eLama\DirectApiV5;

class Request
{
    /** @var string */
    private $clientLogin;

    /** @var  string */
    private $token;

    /** @var string */
    private $service;

    /** @var string */
    private $method;

    /** @var mixed */
    private $params;

    /** @var boolean */
    private $useAgencyUnits;

    /**
     * Request constructor.
     *
     * @param string $token
     * @param string $service
     * @param string $method
     * @param mixed $params
     * @param string $clientLogin
     * @param boolean $useAgencyUnits
     */
    public function __construct($token, $service, $method, $params, $clientLogin = null, $useAgencyUnits = false)
    {
        $this->token = $token;
        $this->service = $service;
        $this->method = $method;
        $this->params = $params;
        $this->clientLogin = $clientLogin;
        $this->useAgencyUnits = (bool) $useAgencyUnits;
    }

    /**
     * @return string
     */
    public function getClientLogin()
    {
        return $this->clientLogin;
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @return string
     */
    public function getSanitizedToken()
    {
        return substr($this->token, 0, 4) . '...' . substr($this->token, -4, 4);
    }

    /**
     * @return string
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }

    public function withSanitizedToken()
    {
        $request = clone $this;

        $request->token = $this->getSanitizedToken();

        return $request;
    }

    /**
     * @return boolean
     */
    public function usesAgencyUnits()
    {
        return $this->useAgencyUnits;
    }
}
