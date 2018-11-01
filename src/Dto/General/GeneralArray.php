<?php


namespace eLama\DirectApiV5\Dto\General;

class GeneralArray
{
    protected $Items;

    public function count()
    {
        return $this->Items ? count($this->Items) : 0;
    }
}
