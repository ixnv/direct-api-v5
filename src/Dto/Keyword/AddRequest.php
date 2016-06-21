<?php

namespace eLama\DirectApiV5\Dto\Keyword;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class AddRequest
{

    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\Keyword\KeywordAddItem>")
     *
     * @var KeywordAddItem $Keywords
     */
    private $Keywords;

    /**
     * @param KeywordAddItem[] $Keywords
     */
    public function __construct(array $Keywords)
    {
      $this->Keywords = $Keywords;
    }

    /**
     * @return KeywordAddItem
     */
    public function getKeywords()
    {
      return $this->Keywords;
    }

    /**
     * @param KeywordAddItem[] $Keywords
     * @return \eLama\DirectApiV5\Dto\Keyword\AddRequest
     */
    public function setKeywords(array $Keywords)
    {
      $this->Keywords = $Keywords;
      return $this;
    }

}
