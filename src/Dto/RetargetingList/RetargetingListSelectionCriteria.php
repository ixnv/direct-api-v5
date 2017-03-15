<?php

namespace eLama\DirectApiV5\Dto\RetargetingList;

class RetargetingListSelectionCriteria
{
    /**
     * @var int[] $Ids
     */
    protected $Ids;

    /**
     * @return int[]
     */
    public function getIds()
    {
        return $this->Ids;
    }

    /**
     * @param int[] $Ids
     * @return self
     */
    public function setIds(array $Ids = null)
    {
        $this->Ids = $Ids;
    
        return $this;
    }
}
