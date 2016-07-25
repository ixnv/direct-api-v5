<?php

namespace eLama\DirectApiV5\Dto\Vcard;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class GetResponseGeneral
{

    /**
     * @JMS\Type("integer")
     *
     * @var int $LimitedBy
     */
    private $LimitedBy;

    /**
     * @return int
     */
    public function getLimitedBy()
    {
        return $this->LimitedBy;
    }

    /**
     * @param int $LimitedBy
     * @return \eLama\DirectApiV5\Dto\Vcard\GetResponseGeneral
     */
    public function setLimitedBy($LimitedBy = null)
    {
        $this->LimitedBy = $LimitedBy;

        return $this;
    }
}
