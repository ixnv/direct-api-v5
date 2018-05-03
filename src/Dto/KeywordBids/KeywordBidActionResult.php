<?php

namespace eLama\DirectApiV5\Dto\Keywordbids;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class KeywordBidActionResult extends KeywordBidBase
{

    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\Keywordbids\ExceptionNotification>")
     *
     * @var ExceptionNotification[] $Warnings
     */
    private $Warnings;

    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\Keywordbids\ExceptionNotification>")
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
     * @return \eLama\DirectApiV5\Dto\Keywordbids\KeywordBidActionResult
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
     * @return \eLama\DirectApiV5\Dto\Keywordbids\KeywordBidActionResult
     */
    public function setErrors(array $Errors = null)
    {
      $this->Errors = $Errors;
      return $this;
    }

}
