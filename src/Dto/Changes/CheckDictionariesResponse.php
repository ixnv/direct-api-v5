<?php

namespace eLama\DirectApiV5\Dto\Changes;

use eLama\DirectApiV5\Dto\General\Enum\YesNoEnum;
use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class CheckDictionariesResponse
{

    /**
     * @JMS\Type("string")
     *
     * @var YesNoEnum $TimeZonesChanged
     */
    private $TimeZonesChanged;

    /**
     * @JMS\Type("string")
     *
     * @var YesNoEnum $RegionsChanged
     */
    private $RegionsChanged;

    /**
     * @JMS\Type("string")
     *
     * @var string $Timestamp
     */
    private $Timestamp;

    /**
     * @param YesNoEnum $TimeZonesChanged
     * @param YesNoEnum $RegionsChanged
     * @param string $Timestamp
     */
    public function __construct($TimeZonesChanged = null, $RegionsChanged = null, $Timestamp = null)
    {
      $this->TimeZonesChanged = $TimeZonesChanged;
      $this->RegionsChanged = $RegionsChanged;
      $this->Timestamp = $Timestamp;
    }

    /**
     * @return YesNoEnum
     */
    public function getTimeZonesChanged()
    {
      return $this->TimeZonesChanged;
    }

    /**
     * @param YesNoEnum $TimeZonesChanged
     * @return \eLama\DirectApiV5\Dto\Changes\CheckDictionariesResponse
     */
    public function setTimeZonesChanged($TimeZonesChanged)
    {
      $this->TimeZonesChanged = $TimeZonesChanged;
      return $this;
    }

    /**
     * @return YesNoEnum
     */
    public function getRegionsChanged()
    {
      return $this->RegionsChanged;
    }

    /**
     * @param YesNoEnum $RegionsChanged
     * @return \eLama\DirectApiV5\Dto\Changes\CheckDictionariesResponse
     */
    public function setRegionsChanged($RegionsChanged)
    {
      $this->RegionsChanged = $RegionsChanged;
      return $this;
    }

    /**
     * @return string
     */
    public function getTimestamp()
    {
      return $this->Timestamp;
    }

    /**
     * @param string $Timestamp
     * @return \eLama\DirectApiV5\Dto\Changes\CheckDictionariesResponse
     */
    public function setTimestamp($Timestamp)
    {
      $this->Timestamp = $Timestamp;
      return $this;
    }

}
