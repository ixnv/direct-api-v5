<?php


namespace eLama\DirectApiV5\Dto\Campaign;

use eLama\DirectApiV5\Dto\General\ArrayOfInteger;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class TextCampaignBase
{

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\General\ArrayOfInteger")
     *
     * @var ArrayOfInteger $CounterIds
     */
    private $CounterIds;

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Campaign\RelevantKeywordsSetting")
     *
     * @var RelevantKeywordsSetting $RelevantKeywords
     */
    private $RelevantKeywords;

    /**
     * @return ArrayOfInteger
     */
    public function getCounterIds()
    {
      return $this->CounterIds;
    }

    /**
     * @param ArrayOfInteger $CounterIds
     * @return self
     */
    public function setCounterIds(ArrayOfInteger $CounterIds = null)
    {
        if (!$CounterIds) {
            $CounterIds = new ArrayOfInteger([]);
        }

        $this->CounterIds = $CounterIds;

        return $this;
    }

    /**
     * @return RelevantKeywordsSetting
     */
    public function getRelevantKeywords()
    {
      return $this->RelevantKeywords;
    }

    /**
     * @param RelevantKeywordsSetting $RelevantKeywords
     * @return self
     */
    public function setRelevantKeywords(RelevantKeywordsSetting $RelevantKeywords = null)
    {
      $this->RelevantKeywords = $RelevantKeywords;
      return $this;
    }

}
