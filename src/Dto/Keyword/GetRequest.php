<?php

namespace eLama\DirectApiV5\Dto\Keyword;

use eLama\DirectApiV5\Dto\General\LimitOffset;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class GetRequest
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
     * @JMS\Type("eLama\DirectApiV5\Dto\General\LimitOffset")
     *
     * @var LimitOffset
     */
    private $Page;

    /**
     * @param KeywordsSelectionCriteria|null $SelectionCriteria
     * @param LimitOffset|null $page
     * @param KeywordFieldEnum[]|null $FieldNames
     */
    public function __construct(KeywordsSelectionCriteria $SelectionCriteria = null, LimitOffset $page = null, array $FieldNames = null)
    {
        $this->SelectionCriteria = $SelectionCriteria;
        $this->Page = $page;
        $this->FieldNames = $FieldNames;
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
     * @return LimitOffset
     */
    public function getPage()
    {
        return $this->Page;
    }

    /**
     * @param LimitOffset $Page
     */
    public function setPage($Page)
    {
        $this->Page = $Page;
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
