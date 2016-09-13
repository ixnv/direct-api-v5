<?php

namespace eLama\DirectApiV5\Dto\Keyword;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class SuspendRequest
{

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Keyword\KeywordsSelectionCriteria")
     *
     * @var KeywordsSelectionCriteria $SelectionCriteria
     */
    private $SelectionCriteria;

    /**
     * @param KeywordsSelectionCriteria $SelectionCriteria
     */
    public function __construct(KeywordsSelectionCriteria $SelectionCriteria = null)
    {
      $this->SelectionCriteria = $SelectionCriteria;
    }

    /**
     * @return KeywordsSelectionCriteria
     */
    public function getSelectionCriteria()
    {
      return $this->SelectionCriteria;
    }

    /**
     * @param KeywordsSelectionCriteria $SelectionCriteria
     * @return \eLama\DirectApiV5\Dto\Keyword\SuspendRequest
     */
    public function setSelectionCriteria(KeywordsSelectionCriteria $SelectionCriteria)
    {
      $this->SelectionCriteria = $SelectionCriteria;
      return $this;
    }

}
