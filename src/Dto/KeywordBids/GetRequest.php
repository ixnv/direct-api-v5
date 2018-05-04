<?php

namespace eLama\DirectApiV5\Dto\KeywordBids;

use eLama\DirectApiV5\Dto\General\GetRequestGeneral;
use eLama\DirectApiV5\Dto\KeywordBids\Enum\KeywordBidFieldEnum;
use eLama\DirectApiV5\Dto\KeywordBids\Enum\KeywordBidNetworkFieldEnum;
use eLama\DirectApiV5\Dto\KeywordBids\Enum\KeywordBidSearchFieldEnum;
use JMS\Serializer\Annotation as JMS;
/**
 * @JMS\AccessType("public_method")
 */
class GetRequest extends GetRequestGeneral
{
    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\KeywordBids\KeywordBidsSelectionCriteria")
     *
     * @var KeywordBidsSelectionCriteria $SelectionCriteria
     */
    private $SelectionCriteria;

    /**
     * @JMS\Type("array")
     *
     * @var string[] $FieldNames
     */
    private $FieldNames;

    /**
     * @JMS\Type("array")
     *
     * @var string[] $SearchFieldNames
     */
    private $SearchFieldNames;

    /**
     * @JMS\Type("array")
     *
     * @var string[] $NetworkFieldNames
     */
    private $NetworkFieldNames;

    /**
     * @param KeywordBidsSelectionCriteria $SelectionCriteria
     * @param KeywordBidFieldEnum $FieldNames
     * @param KeywordBidSearchFieldEnum $SearchFieldNames
     * @param KeywordBidNetworkFieldEnum $NetworkFieldNames
     */
    public function __construct(
        KeywordBidsSelectionCriteria $SelectionCriteria = null,
        $FieldNames = null,
        $SearchFieldNames = null,
        $NetworkFieldNames = null
    ) {
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
     * @return \eLama\DirectApiV5\Dto\KeywordBids\GetRequest
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
     * @return \eLama\DirectApiV5\Dto\KeywordBids\GetRequest
     */
    public function setFieldNames($FieldNames)
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
     * @return \eLama\DirectApiV5\Dto\KeywordBids\GetRequest
     */
    public function setSearchFieldNames($SearchFieldNames)
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
     * @return \eLama\DirectApiV5\Dto\KeywordBids\GetRequest
     */
    public function setNetworkFieldNames($NetworkFieldNames)
    {
      $this->NetworkFieldNames = $NetworkFieldNames;

      return $this;
    }
}
