<?php

namespace eLama\DirectApiV5\Dto\Keywordbids;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class GetRequest
{

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Keywordbids\KeywordBidsSelectionCriteria")
     *
     * @var KeywordBidsSelectionCriteria $SelectionCriteria
     */
    private $SelectionCriteria;

    /**
     * @JMS\Type("string")
     *
     * @var KeywordBidFieldEnum $FieldNames
     */
    private $FieldNames;

    /**
     * @JMS\Type("string")
     *
     * @var KeywordBidSearchFieldEnum $SearchFieldNames
     */
    private $SearchFieldNames;

    /**
     * @JMS\Type("string")
     *
     * @var KeywordBidNetworkFieldEnum $NetworkFieldNames
     */
    private $NetworkFieldNames;

    /**
     * @param KeywordBidsSelectionCriteria $SelectionCriteria
     * @param KeywordBidFieldEnum $FieldNames
     * @param KeywordBidSearchFieldEnum $SearchFieldNames
     * @param KeywordBidNetworkFieldEnum $NetworkFieldNames
     */
    public function __construct(KeywordBidsSelectionCriteria $SelectionCriteria = null, string $FieldNames = null, string $SearchFieldNames = null, string $NetworkFieldNames = null)
    {
      $this->SelectionCriteria = $SelectionCriteria;
      $this->FieldNames = $FieldNames;
      $this->SearchFieldNames = $SearchFieldNames;
      $this->NetworkFieldNames = $NetworkFieldNames;
    }

    /**
     * @return KeywordBidsSelectionCriteria
     */
    public function getSelectionCriteria()
    {
      return $this->SelectionCriteria;
    }

    /**
     * @param KeywordBidsSelectionCriteria $SelectionCriteria
     * @return \eLama\DirectApiV5\Dto\Keywordbids\GetRequest
     */
    public function setSelectionCriteria(KeywordBidsSelectionCriteria $SelectionCriteria)
    {
      $this->SelectionCriteria = $SelectionCriteria;
      return $this;
    }

    /**
     * @return KeywordBidFieldEnum
     */
    public function getFieldNames()
    {
      return $this->FieldNames;
    }

    /**
     * @param KeywordBidFieldEnum $FieldNames
     * @return \eLama\DirectApiV5\Dto\Keywordbids\GetRequest
     */
    public function setFieldNames(string $FieldNames)
    {
      $this->FieldNames = $FieldNames;
      return $this;
    }

    /**
     * @return KeywordBidSearchFieldEnum
     */
    public function getSearchFieldNames()
    {
      return $this->SearchFieldNames;
    }

    /**
     * @param KeywordBidSearchFieldEnum $SearchFieldNames
     * @return \eLama\DirectApiV5\Dto\Keywordbids\GetRequest
     */
    public function setSearchFieldNames(string $SearchFieldNames)
    {
      $this->SearchFieldNames = $SearchFieldNames;
      return $this;
    }

    /**
     * @return KeywordBidNetworkFieldEnum
     */
    public function getNetworkFieldNames()
    {
      return $this->NetworkFieldNames;
    }

    /**
     * @param KeywordBidNetworkFieldEnum $NetworkFieldNames
     * @return \eLama\DirectApiV5\Dto\Keywordbids\GetRequest
     */
    public function setNetworkFieldNames(string $NetworkFieldNames)
    {
      $this->NetworkFieldNames = $NetworkFieldNames;
      return $this;
    }

}
