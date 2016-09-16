<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use eLama\DirectApiV5\Dto\General\IdsCriteria;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 * @deprecated use eLama\DirectApiV5\Dto\General\SuspendRequest instead
 */
class SuspendRequest extends \eLama\DirectApiV5\Dto\General\SuspendRequest
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
    public function __construct(IdsCriteria $SelectionCriteria)
    {
        parent::__construct($SelectionCriteria);
        trigger_error('\eLama\DirectApiV5\Dto\Campaign\SuspendRequest is called', E_USER_DEPRECATED);
    }
}
