<?php

namespace eLama\DirectApiV5;

use eLama\DirectApiV5\LowLevelDriver\LowLevelDriverInterface;
use JMS\Serializer\Serializer;

/**
 * @deprecated Класс переименован
 * @see DtoDirectDriver
 */
class DtoAwareDirectDriver extends DtoDirectDriver
{
    /**
     * DtoAwareDirectDriver constructor.
     * @deprecated Класс переименован
     * @see DtoDirectDriver
     *
     * @param Serializer $jmsSerializer
     * @param LowLevelDriverInterface $driver
     * @param string $token
     * @param string $login
     */
    public function __construct(
        Serializer $jmsSerializer,
        LowLevelDriverInterface $driver,
        $token,
        $login = null
    ) {
        trigger_error('Класс `DtoAwareDirectDriver` устарел, используй `DtoDirectDriver` или фабрику', E_USER_DEPRECATED);
        parent::__construct($jmsSerializer, $driver, $token, $login);
    }

}
