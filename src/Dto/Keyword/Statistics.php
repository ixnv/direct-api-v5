<?php

namespace eLama\DirectApiV5\Dto\Keyword;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class Statistics
{

    /**
     * @JMS\Type("integer")
     *
     * @var int $Clicks
     */
    private $Clicks;

    /**
     * @JMS\Type("integer")
     *
     * @var int $Impressions
     */
    private $Impressions;

    /**
     * @param int $Clicks
     * @param int $Impressions
     */
    public function __construct($Clicks = null, $Impressions = null)
    {
      $this->Clicks = $Clicks;
      $this->Impressions = $Impressions;
    }

    /**
     * @return int
     */
    public function getClicks()
    {
      return $this->Clicks;
    }

    /**
     * @param int $Clicks
     * @return \eLama\DirectApiV5\Dto\Keyword\Statistics
     */
    public function setClicks($Clicks)
    {
      $this->Clicks = $Clicks;
      return $this;
    }

    /**
     * @return int
     */
    public function getImpressions()
    {
      return $this->Impressions;
    }

    /**
     * @param int $Impressions
     * @return \eLama\DirectApiV5\Dto\Keyword\Statistics
     */
    public function setImpressions($Impressions)
    {
      $this->Impressions = $Impressions;
      return $this;
    }

}
