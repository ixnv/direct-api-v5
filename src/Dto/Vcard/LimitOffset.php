<?php

namespace eLama\DirectApiV5\Dto\Vcard;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class LimitOffset
{

    /**
     * @JMS\Type("integer")
     *
     * @var int $Limit
     */
    private $Limit;

    /**
     * @JMS\Type("integer")
     *
     * @var int $Offset
     */
    private $Offset;

    /**
     * @return int
     */
    public function getLimit()
    {
        return $this->Limit;
    }

    /**
     * @param int $Limit
     * @return \eLama\DirectApiV5\Dto\Vcard\LimitOffset
     */
    public function setLimit($Limit = null)
    {
        $this->Limit = $Limit;

        return $this;
    }

    /**
     * @return int
     */
    public function getOffset()
    {
        return $this->Offset;
    }

    /**
     * @param int $Offset
     * @return \eLama\DirectApiV5\Dto\Vcard\LimitOffset
     */
    public function setOffset($Offset = null)
    {
        $this->Offset = $Offset;

        return $this;
    }

}
