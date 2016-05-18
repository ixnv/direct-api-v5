<?php

namespace eLama\DirectApiV5;

class UnitsInfo
{
    /** @var int израсходовано при выполнении запроса */
    private $taken;

    /** @var int доступный остаток суточного лимита */
    private $left;

    /** @var int суточный лимит */
    private $dailyLimit;

    /**
     * @param int $taken
     * @param int $left
     * @param int $dailyLimit
     */
    public function __construct($taken, $left, $dailyLimit)
    {
        $this->taken = $taken;
        $this->left = $left;
        $this->dailyLimit = $dailyLimit;
    }

}
