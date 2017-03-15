<?php

namespace eLama\DirectApiV5\Dto\RetargetingList;

class RetargetingListUpdateItem extends RetargetingListBase
{
    /**
     * @var int $id
     */
    protected $id;

    /**
     * @param int $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;
    
        return $this;
    }
}
