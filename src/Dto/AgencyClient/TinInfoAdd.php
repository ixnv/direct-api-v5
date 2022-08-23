<?php

namespace eLama\DirectApiV5\Dto\AgencyClient;

use eLama\DirectApiV5\Dto\AgencyClient\Enum\TinTypeEnum;

class TinInfoAdd
{
    /**
     * @var TinTypeEnum $tinType
     */
    private $TinType;

    /**
     * @var string $tin
     */
    private $Tin;

    /**
     * @param string $tinType
     * @param string $tin
     */
    public function __construct($tinType, $tin)
    {
        $this->TinType = $tinType;
        $this->Tin = $tin;
    }

    /**
     * @return TinTypeEnum
     */
    public function getTinType()
    {
        return $this->TinType;
    }

    /**
     * @param string $tinType
     * @return self
     */
    public function setTinType(string $tinType)
    {
        $this->TinType = $tinType;

        return $this;
    }

    /**
     * @return string
     */
    public function getTin()
    {
        return $this->Tin;
    }

    /**
     * @param string $tin
     * @return self
     */
    public function setTin(string $tin)
    {
        $this->Tin = $tin;

        return $this;
    }
}
