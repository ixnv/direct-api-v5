<?php

namespace eLama\DirectApiV5\Dto\Keyword;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class KeywordUpdateItem
{

    /**
     * @JMS\Type("integer")
     *
     * @var int $Id
     */
    private $Id;

    /**
     * @JMS\Type("string")
     *
     * @var string $Keyword
     */
    private $Keyword;

    /**
     * @JMS\Type("string")
     *
     * @var string $UserParam1
     */
    private $UserParam1;

    /**
     * @JMS\Type("string")
     *
     * @var string $UserParam2
     */
    private $UserParam2;

    /**
     * @param int $Id
     */
    public function __construct($Id = null)
    {
      $this->Id = $Id;
    }

    /**
     * @return int
     */
    public function getId()
    {
      return $this->Id;
    }

    /**
     * @param int $Id
     * @return \eLama\DirectApiV5\Dto\Keyword\KeywordUpdateItem
     */
    public function setId($Id)
    {
      $this->Id = $Id;
      return $this;
    }

    /**
     * @return string
     */
    public function getKeyword()
    {
      return $this->Keyword;
    }

    /**
     * @param string $Keyword
     * @return \eLama\DirectApiV5\Dto\Keyword\KeywordUpdateItem
     */
    public function setKeyword($Keyword = null)
    {
      $this->Keyword = $Keyword;
      return $this;
    }

    /**
     * @return string
     */
    public function getUserParam1()
    {
      return $this->UserParam1;
    }

    /**
     * @param string $UserParam1
     * @return \eLama\DirectApiV5\Dto\Keyword\KeywordUpdateItem
     */
    public function setUserParam1($UserParam1 = null)
    {
      $this->UserParam1 = $UserParam1;
      return $this;
    }

    /**
     * @return string
     */
    public function getUserParam2()
    {
      return $this->UserParam2;
    }

    /**
     * @param string $UserParam2
     * @return \eLama\DirectApiV5\Dto\Keyword\KeywordUpdateItem
     */
    public function setUserParam2($UserParam2 = null)
    {
      $this->UserParam2 = $UserParam2;
      return $this;
    }

}
