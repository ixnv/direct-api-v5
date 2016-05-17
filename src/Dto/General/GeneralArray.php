<?php


namespace eLama\DirectApiV5\Dto\General;

class GeneralArray
{
    protected $Items;

    public function count()
    {
        return count($this->Items);
    }
}
