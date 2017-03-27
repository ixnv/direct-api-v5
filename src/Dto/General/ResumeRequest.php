<?php

namespace eLama\DirectApiV5\Dto\General;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class ResumeRequest
{

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\General\IdsCriteria")
     *
     * @var IdsCriteria $SelectionCriteria
     */
    private $SelectionCriteria;

    /**
     * @param IdsCriteria $SelectionCriteria
     */
    public function __construct(IdsCriteria $SelectionCriteria = null)
    {
        $this->SelectionCriteria = $SelectionCriteria;
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

}
