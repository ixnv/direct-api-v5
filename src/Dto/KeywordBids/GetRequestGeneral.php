<?php

namespace eLama\DirectApiV5\Dto\Keywordbids;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class GetRequestGeneral
{

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Keywordbids\LimitOffset")
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

    /**
     * @param LimitOffset $Page
     * @return \eLama\DirectApiV5\Dto\Keywordbids\GetRequestGeneral
     */
    public function setPage(LimitOffset $Page = null)
    {
      $this->Page = $Page;
      return $this;
    }

}
