<?php

namespace eLama\DirectApiV5;

class UnitsInfo
{
    /** @var string|int израсходовано при выполнении запроса */
    private $taken;

    /** @var string|int доступный остаток суточного лимита */
    private $left;

    /** @var string|int суточный лимит */
    private $dailyLimit;

    /**
     * @param int $taken
     * @param int $left
     * @param int $dailyLimit
     */
    public function __construct($taken, $left, $dailyLimit)
    {
        $this->taken = (int)$taken;
        $this->left = (int)$left;
        $this->dailyLimit = (int)$dailyLimit;
    }

    /**
     * @return int
     */
    public function getTaken()
    {
        return $this->taken;
    }

    /**
     * @return int
     */
    public function getLeft()
    {
        return $this->left;
    }

    /**
     * @return int
     */
    public function getDailyLimit()
    {
        return $this->dailyLimit;
    }
}
