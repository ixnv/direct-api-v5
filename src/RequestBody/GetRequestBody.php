<?php

namespace eLama\DirectApiV5\RequestBody;

use eLama\DirectApiV5\Dto\General\GetRequestGeneral;
use eLama\DirectApiV5\Dto\General\GetResultGeneral;
use eLama\DirectApiV5\Dto\General\LimitOffset;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
abstract class GetRequestBody extends RequestBody
{
    /** @var GetRequestGeneral */
    protected $request;

    public function method()
    {
        return 'get';
    }

    public function getLimit()
    {
        if($this->request->getPage()) {
            return $this->request->getPage()->getLimit();
        }

        return null;
    }

    /**
     * @param int $limit
     */
    public function setLimit($limit)
    {
        if (!$this->request->getPage()) {
            $this->request->setPage(new LimitOffset());
        }

        $this->request->getPage()->setLimit($limit);
    }

    public function getOffset()
    {
        if($this->request->getPage()) {
            return $this->request->getPage()->getOffset();
        }

        return null;
    }

    /**
     * @param int $offset
     */
    public function setOffset($offset)
    {
        if (!$this->request->getPage()) {
            $this->request->setPage(new LimitOffset());
        }

        $this->request->getPage()->setOffset($offset);
    }

    /**
     * @param \eLama\DirectApiV5\Dto\General\GetResultGeneral $getResult
     * @return GetRequestBody
     */
    public function paramsForNextPage(GetResultGeneral $getResult)
    {
        $newParams = clone $this;
        $newParams->request = $this->request->requestForNextPage($getResult);

        return $newParams;
    }

    public function __clone()
    {
        $this->request = clone $this->request;
    }
}
