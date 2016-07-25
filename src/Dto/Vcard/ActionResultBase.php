<?php

namespace eLama\DirectApiV5\Dto\Vcard;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class ActionResultBase
{

    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\Vcard\ExceptionNotification>")
     *
     * @var ExceptionNotification[] $Warnings
     */
    private $Warnings;

    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\Vcard\ExceptionNotification>")
     *
     * @var ExceptionNotification[] $Errors
     */
    private $Errors;

    /**
     * @return ExceptionNotification[]
     */
    public function getWarnings()
    {
        return $this->Warnings;
    }

    /**
     * @param ExceptionNotification[] $Warnings
     * @return \eLama\DirectApiV5\Dto\Vcard\ActionResultBase
     */
    public function setWarnings(array $Warnings = null)
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
     * @return \eLama\DirectApiV5\Dto\Vcard\ActionResultBase
     */
    public function setErrors(array $Errors = null)
    {
        $this->Errors = $Errors;

        return $this;
    }

}
