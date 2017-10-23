<?php

namespace eLama\DirectApiV5\Dto\AgencyClient;

class AgencyClientsSelectionCriteria
{
    /**
     * @var string[] $Logins
     */
    private $Logins;

    /**
     * @var string $Archived
     */
    private $Archived;

    /**
     * @return string[]
     */
    public function getLogins()
    {
        return $this->Logins;
    }

    /**
     * @param string[] $Logins
     * @return self
     */
    public function setLogins(array $Logins = null)
    {
        $this->Logins = $Logins;
    
        return $this;
    }

    /**
     * @return string
     */
    public function getArchived()
    {
        return $this->Archived;
    }

    /**
     * @param string $Archived
     * @return self
     */
    public function setArchived($Archived = null)
    {
        $this->Archived = $Archived;
    
        return $this;
    }
}
