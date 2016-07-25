<?php

namespace eLama\DirectApiV5\Dto\Vcard;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class DeleteRequest
{

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Vcard\IdsCriteria")
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
     * @return \eLama\DirectApiV5\Dto\Vcard\DeleteRequest
     */
    public function setSelectionCriteria(IdsCriteria $SelectionCriteria)
    {
        $this->SelectionCriteria = $SelectionCriteria;

        return $this;
    }

}
