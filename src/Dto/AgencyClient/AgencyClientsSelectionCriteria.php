<?php

namespace eLama\DirectApiV5\AgencyClient;

use eLama\DirectApiV5\Dto\General\Enum\YesNoEnum;

class AgencyClientsSelectionCriteria
{
    /**
     * @var string[] $logins
     */
    private $logins;

    /**
     * @var YesNoEnum $archived
     */
    private $archived;

    /**
     * @return string[]
     */
    public function getLogins()
    {
        return $this->logins;
    }

    /**
     * @param string[] $logins
     * @return self
     */
    public function setLogins(array $logins = null)
    {
        $this->logins = $logins;
    
        return $this;
    }

    /**
     * @return YesNoEnum
     */
    public function getArchived()
    {
        return $this->archived;
    }

    /**
     * @param YesNoEnum $archived
     * @return self
     */
    public function setArchived(YesNoEnum $archived = null)
    {
        $this->archived = $archived;
    
        return $this;
    }
}
