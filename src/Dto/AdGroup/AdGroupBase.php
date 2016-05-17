<?php

namespace eLama\DirectApiV5\Dto\AdGroup;

use eLama\DirectApiV5\Dto\General\ArrayOfString;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class AdGroupBase
{
    /**
     * @JMS\Type("array<integer>")
     *
     * @var int[] $RegionIds
     */
    private $RegionIds;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\General\ArrayOfString")
     *
     * @var ArrayOfString $NegativeKeywords
     */
    private $NegativeKeywords;

    /**
     * @JMS\Type("string")
     *
     * @var string $TrackingParams
     */
    private $TrackingParams;

    /**
     * @return int[]
     */
    public function getRegionIds()
    {
      return $this->RegionIds;
    }

    /**
     * @param int[] $RegionIds
     * @return \eLama\DirectApiV5\Dto\AdGroup\AdGroupBase
     */
    public function setRegionIds(array $RegionIds = null)
    {
      $this->RegionIds = $RegionIds;
      return $this;
    }

    /**
     * @return ArrayOfString
     */
    public function getNegativeKeywords()
    {
      return $this->NegativeKeywords;
    }

    /**
     * @param ArrayOfString $NegativeKeywords
     * @return \eLama\DirectApiV5\Dto\AdGroup\AdGroupBase
     */
    public function setNegativeKeywords(ArrayOfString $NegativeKeywords = null)
    {
      $this->NegativeKeywords = $NegativeKeywords;
      return $this;
    }

    /**
     * @return string
     */
    public function getTrackingParams()
    {
      return $this->TrackingParams;
    }

    /**
     * @param string $TrackingParams
     * @return \eLama\DirectApiV5\Dto\AdGroup\AdGroupBase
     */
    public function setTrackingParams($TrackingParams = null)
    {
      $this->TrackingParams = $TrackingParams;
      return $this;
    }

}
