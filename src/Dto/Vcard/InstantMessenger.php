<?php

namespace eLama\DirectApiV5\Dto\Vcard;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class InstantMessenger
{

    /**
     * @JMS\Type("string")
     *
     * @var string $MessengerClient
     */
    private $MessengerClient;

    /**
     * @JMS\Type("string")
     *
     * @var string $MessengerLogin
     */
    private $MessengerLogin;

    /**
     * @param string $MessengerClient
     * @param string $MessengerLogin
     */
    public function __construct($MessengerClient = null, $MessengerLogin = null)
    {
        $this->MessengerClient = $MessengerClient;
        $this->MessengerLogin = $MessengerLogin;
    }

    /**
     * @return string
     */
    public function getMessengerClient()
    {
        return $this->MessengerClient;
    }

    /**
     * @param string $MessengerClient
     * @return \eLama\DirectApiV5\Dto\Vcard\InstantMessenger
     */
    public function setMessengerClient($MessengerClient)
    {
        $this->MessengerClient = $MessengerClient;

        return $this;
    }

    /**
     * @return string
     */
    public function getMessengerLogin()
    {
        return $this->MessengerLogin;
    }

    /**
     * @param string $MessengerLogin
     * @return \eLama\DirectApiV5\Dto\Vcard\InstantMessenger
     */
    public function setMessengerLogin($MessengerLogin)
    {
        $this->MessengerLogin = $MessengerLogin;

        return $this;
    }

}
