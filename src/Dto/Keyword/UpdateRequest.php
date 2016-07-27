<?php

namespace eLama\DirectApiV5\Dto\Keyword;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class UpdateRequest
{

    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\Keyword\KeywordUpdateItem>")
     *
     * @var KeywordUpdateItem[] $Keywords
     */
    private $Keywords;

    /**
     * @param KeywordUpdateItem[] $Keywords
     */
    public function __construct(array $Keywords = [])
    {
        $this->Keywords = $Keywords;
    }

    /**
     * @return KeywordUpdateItem[]
     */
    public function getKeywords()
    {
        return $this->Keywords;
    }

    /**
     * @param KeywordUpdateItem[] $Keywords
     * @return \eLama\DirectApiV5\Dto\Keyword\UpdateRequest
     */
    public function setKeywords(array $Keywords)
    {
        $this->Keywords = $Keywords;

        return $this;
    }
}
