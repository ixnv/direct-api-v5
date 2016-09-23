<?php

namespace eLama\DirectApiV5\Dto\Bids;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class GetRequest
{

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Bids\BidsSelectionCriteria")
     *
     * @var BidsSelectionCriteria $SelectionCriteria
     */
    private $SelectionCriteria;

    /**
     * @JMS\Type("array")
     *
     * @var BidFieldEnum $FieldNames
     */
    private $FieldNames;

    /**
     * @param BidsSelectionCriteria $SelectionCriteria
     * @param BidFieldEnum $FieldNames
     */
    public function __construct(BidsSelectionCriteria $SelectionCriteria = null, $FieldNames = null)
    {
      $this->SelectionCriteria = $SelectionCriteria;
      $this->FieldNames = $FieldNames;
    }

    /**
     * @return BidsSelectionCriteria
     */
    public function getSelectionCriteria()
    {
      return $this->SelectionCriteria;
    }

    /**
     * @param BidsSelectionCriteria $SelectionCriteria
     * @return \eLama\DirectApiV5\Dto\Bids\GetRequest
     */
    public function setSelectionCriteria(BidsSelectionCriteria $SelectionCriteria)
    {
      $this->SelectionCriteria = $SelectionCriteria;
      return $this;
    }

    /**
     * @return BidFieldEnum
     */
    public function getFieldNames()
    {
      return $this->FieldNames;
    }

    /**
     * @param BidFieldEnum $FieldNames
     * @return \eLama\DirectApiV5\Dto\Bids\GetRequest
     */
    public function setFieldNames($FieldNames)
    {
      $this->FieldNames = $FieldNames;
      return $this;
    }

}
