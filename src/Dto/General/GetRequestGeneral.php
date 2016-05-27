<?php

namespace eLama\DirectApiV5\Dto\General;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
abstract class GetRequestGeneral
{

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\General\LimitOffset")
     *
     * @var LimitOffset $Page
     */
    private $Page;

    /**
     * @return LimitOffset
     */
    final public function getPage()
    {
        return $this->Page;
    }

    final public function setPage(LimitOffset $Page = null)
    {
        $this->Page = $Page;
        return $this;
    }

    /**
     * @return GetRequestGeneral
     */
    final public function requestForNextPage(GetResultGeneral $result)
    {
        $newRequest = clone $this;

        $limit = $this->Page ? $this->Page->getLimit() : null;
        $newRequest->setPage(new LimitOffset($limit, $result->getLimitedBy()));

        return $newRequest;
    }
}
