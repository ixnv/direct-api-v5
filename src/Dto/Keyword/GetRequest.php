<?php

namespace eLama\DirectApiV5\Dto\Keyword;

use eLama\DirectApiV5\Dto\General\GetRequestGeneral;
use eLama\DirectApiV5\Dto\General\LimitOffset;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class GetRequest extends GetRequestGeneral
{

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Keyword\KeywordsSelectionCriteria")
     *
     * @var KeywordsSelectionCriteria $SelectionCriteria
     */
    private $SelectionCriteria;

    /**
     * @JMS\Type("array<string>")
     *
     * @var string[] $FieldNames
     */
    private $FieldNames;

    /**
     * @param KeywordsSelectionCriteria|null $SelectionCriteria
     * @param LimitOffset|null $page
     * @param KeywordFieldEnum[]|null $FieldNames
     */
    public function __construct(KeywordsSelectionCriteria $SelectionCriteria = null, LimitOffset $page = null, array $FieldNames = null)
    {
        $this->SelectionCriteria = $SelectionCriteria;
        $this->FieldNames = $FieldNames;

        $this->setPage($page);
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
     * @return \eLama\DirectApiV5\Dto\Keyword\GetRequest
     */
    public function setSelectionCriteria(KeywordsSelectionCriteria $SelectionCriteria)
    {
        $this->SelectionCriteria = $SelectionCriteria;
        return $this;
    }
    
    /**
     * @return KeywordFieldEnum
     */
    public function getFieldNames()
    {
        return $this->FieldNames;
    }

    /**
     * @param KeywordFieldEnum $FieldNames
     * @return \eLama\DirectApiV5\Dto\Keyword\GetRequest
     */
    public function setFieldNames($FieldNames)
    {
        $this->FieldNames = $FieldNames;
        return $this;
    }

}
