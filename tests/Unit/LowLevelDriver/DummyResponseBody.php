<?php

namespace eLama\DirectApiV5\Test\Unit\LowLevelDriver;

use eLama\DirectApiV5\Dto\General\ResponseBody;
use JMS\Serializer\Annotation as JMS;

class DummyResponseBody extends ResponseBody
{
    /**
     * @JMS\Type("eLama\DirectApiV5\Test\Unit\LowLevelDriver\DummyResult")
     *
     * @var DummyResult
     */
    protected $result;
}