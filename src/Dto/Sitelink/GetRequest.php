<?php

namespace eLama\DirectApiV5\Dto\Sitelink;

use eLama\DirectApiV5\Dto\General\GetRequestGeneral;
use eLama\DirectApiV5\Dto\General\IdsCriteria;
use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class GetRequest extends GetRequestGeneral
{

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Sitelink\IdsCriteria")
     *
     * @var IdsCriteria $SelectionCriteria
     */
    private $SelectionCriteria;

    /**
     * @JMS\Type("string")
     *
     * @var SitelinksSetFieldEnum $FieldNames
     */
    private $FieldNames;

    /**
     * @param IdsCriteria $SelectionCriteria
     * @param SitelinksSetFieldEnum $FieldNames
     */
    public function __construct(IdsCriteria $SelectionCriteria = null, $FieldNames = null)
    {
      $this->SelectionCriteria = $SelectionCriteria;
      $this->FieldNames = $FieldNames;
    }

    /**
     * @return IdsCriteria
     */
    public function getSelectionCriteria()
    {
      return $this->SelectionCriteria;
    }

    /**
     * @param IdsCriteria $SelectionCriteria
     * @return \eLama\DirectApiV5\Dto\Sitelink\GetRequest
     */
    public function setSelectionCriteria(IdsCriteria $SelectionCriteria)
    {
      $this->SelectionCriteria = $SelectionCriteria;
      return $this;
    }

    /**
     * @return SitelinksSetFieldEnum
     */
    public function getFieldNames()
    {
      return $this->FieldNames;
    }

    /**
     * @param SitelinksSetFieldEnum $FieldNames
     * @return \eLama\DirectApiV5\Dto\Sitelink\GetRequest
     */
    public function setFieldNames($FieldNames)
    {
      $this->FieldNames = $FieldNames;
      return $this;
    }

}
