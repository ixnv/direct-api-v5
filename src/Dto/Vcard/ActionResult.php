<?php

namespace eLama\DirectApiV5\Dto\Vcard;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class ActionResult extends ActionResultBase
{

    /**
     * @JMS\Type("integer")
     *
     * @var int $Id
     */
    private $Id;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->Id;
    }

    /**
     * @param int $Id
     * @return \eLama\DirectApiV5\Dto\Vcard\ActionResult
     */
    public function setId($Id)
    {
        $this->Id = $Id;

        return $this;
    }

}
