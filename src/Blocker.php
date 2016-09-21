<?php

namespace eLama\DirectApiV5;

interface Blocker
{
    /**
     * @return bool
     */
    public function isBlocked();

    /**
     * @return void
     */
    public function block();
}
