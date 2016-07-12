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
     * @JMS\Type("eLama\DirectApiV5\Dto\General\IdsCriteria")
     *
     * @var IdsCriteria $SelectionCriteria
     */
    private $SelectionCriteria;

    /**
     * @JMS\Type("array<string>")
     *
     * @var string[] $FieldNames
     * @see SitelinksSetFieldEnum
     */
    private $FieldNames;

    /**
     * @param IdsCriteria $SelectionCriteria
     * @param string[] $FieldNames
     * @see SitelinksSetFieldEnum
     */
    public function __construct(IdsCriteria $SelectionCriteria = null, array $FieldNames = null)
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
     * @return self
     */
    public function setSelectionCriteria(IdsCriteria $SelectionCriteria)
    {
      $this->SelectionCriteria = $SelectionCriteria;

      return $this;
    }

    /**
     * @return string[]
     */
    public function getFieldNames()
    {
      return $this->FieldNames;
    }

    /**
     * @param string[] $FieldNames
     * @return self
     */
    public function setFieldNames(array $FieldNames)
    {
      $this->FieldNames = $FieldNames;

      return $this;
    }

}
