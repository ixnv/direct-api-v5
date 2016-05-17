<?php


namespace eLama\DirectApiV5\RequestResponse;

use eLama\DirectApiV5\Dto\General\LimitOffset;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
abstract class GetRequestGeneral extends GeneralRequest
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

    protected function method()
    {
        return 'get';
    }

}
