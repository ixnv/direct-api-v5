<?php

namespace eLama\DirectApiV5\Dto\Changes;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class CheckCampaignsRequest
{

    /**
     * @JMS\Type("string")
     *
     * @var string $Timestamp
     */
    private $Timestamp;

    /**
     * @param string $Timestamp
     */
    public function __construct($Timestamp)
    {
      $this->setTimestamp($Timestamp);
    }

    /**
     * @return string
     */
    public function getTimestamp()
    {
      return $this->Timestamp;
    }

    /**
     * @param string|\DateTimeImmutable $Timestamp
     * @return \eLama\DirectApiV5\Dto\Changes\CheckRequest
     */
    public function setTimestamp($Timestamp)
    {
        if ($Timestamp instanceof \DateTimeImmutable) {
            $Timestamp = $Timestamp->setTimezone(new \DateTimeZone('UTC'))->format('Y-m-d\TH:i:s\Z');
        }
        $this->Timestamp = $Timestamp;

        return $this;
    }
}
