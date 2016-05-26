<?php

namespace eLama\DirectApiV5\Params;

use eLama\DirectApiV5\Dto\General\GeneralGetRequest;
use eLama\DirectApiV5\Dto\General\GetResultGeneral;
use eLama\DirectApiV5\Dto\General\LimitOffset;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
abstract class GetParams extends Params
{
    /** @var GeneralGetRequest */
    protected $request;

    public function method()
    {
        return 'get';
    }

    public function setLimit($limit)
    {
        if (!$this->request->getPage()) {
            $this->request->setPage(new LimitOffset());
        }

        $this->request->getPage()->setLimit($limit);
    }

    /**
     * @param \eLama\DirectApiV5\Dto\General\GetResultGeneral $getResult
     * @return GetParams
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
