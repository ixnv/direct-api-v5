<?php

namespace eLama\DirectApiV5\Params;

use eLama\DirectApiV5\Dto\General\LimitOffset;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
abstract class GetParams extends Params
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
    public function getPage()
    {
      return $this->Page;
    }

    public function setPage(LimitOffset $Page = null)
    {
      $this->Page = $Page;
      return $this;
    }

    public function method()
    {
        return 'get';
    }

}
