<?php

namespace eLama\DirectApiV5\Service;

use eLama\DirectApiV5\DtoAwareDirectDriver;
use eLama\DirectApiV5\RequestBody\GetRequestBody;

abstract class Service
{
    /** @var DtoAwareDirectDriver */
    protected $driver;

    public function __construct(DtoAwareDirectDriver $dtoAwareDirectDriver)
    {
        $this->driver = $dtoAwareDirectDriver;
    }

    protected function callGetCollectingItems(GetRequestBody $params, $pageLimit = null)
    {
        if ($pageLimit) {
            $params->setLimit($pageLimit);
        }

        return $this->driver->callGetCollectingItems($params);
    }
}
