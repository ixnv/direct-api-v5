<?php

namespace eLama\DirectApiV5\Dto\Keyword;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class KeywordProductivity
{

    /**
     * @JMS\Type("double")
     *
     * @var float $Value
     */
    private $Value;

    /**
     * @JMS\Type("array<integer>")
     *
     * @var int[] $References
     */
    private $References;

    /**
     * @return float
     */
    public function getValue()
    {
      return $this->Value;
    }

    /**
     * @param float $Value
     * @return \eLama\DirectApiV5\Dto\Keyword\KeywordProductivity
     */
    public function setValue(float $Value = null)
    {
      $this->Value = $Value;
      return $this;
    }

    /**
     * @return int[]
     */
    public function getReferences()
    {
      return $this->References;
    }

    /**
     * @param int[] $References
     * @return \eLama\DirectApiV5\Dto\Keyword\KeywordProductivity
     */
    public function setReferences(array $References = null)
    {
      $this->References = $References;
      return $this;
    }

}
