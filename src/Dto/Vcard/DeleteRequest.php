<?php

namespace eLama\DirectApiV5\Dto\Vcard;

use JMS\Serializer\Annotation as JMS;

use eLama\DirectApiV5\Dto\General\IdsCriteria;


/**
 * @JMS\AccessType("public_method")
 */
class DeleteRequest
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
     * @return \eLama\DirectApiV5\Dto\General\DeleteRequest
     */
    public function setSelectionCriteria(IdsCriteria $SelectionCriteria)
    {
        $this->SelectionCriteria = $SelectionCriteria;

        return $this;
    }

}
