<?php

namespace eLama\DirectApiV5\Dto\Keyword;

use eLama\DirectApiV5\Dto\General\GetResponseGeneral;
use eLama\DirectApiV5\Dto\General\GetResultGeneral;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class GetResult extends GetResultGeneral
{

    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\Keyword\KeywordGetItem>")
     *
     * @var KeywordGetItem[] $Keywords
     */
    private $Keywords;

    /**
     * @param KeywordGetItem[] $Keywords
     */
    public function __construct(array $Keywords = null)
    {
      $this->Keywords = $Keywords;
    }

    /**
     * @return KeywordGetItem[]
     */
    public function getKeywords()
    {
        return $this->Keywords ?: [];
    }

    /**
     * @param KeywordGetItem[] $Keywords
     * @return GetResponseGeneral
     */
    public function setKeywords(array $Keywords)
    {
      $this->Keywords = $Keywords;
      return $this;
    }

    /**
     * @return mixed
     */
    public function getItems()
    {
        return $this->getKeywords();
    }
}
