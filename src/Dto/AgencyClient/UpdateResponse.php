<?php

namespace eLama\DirectApiV5\AgencyClient;

class UpdateResponse
{
    /**
     * @var eLama\DirectApiV5\General\ClientsActionResult[] $updateResults
     */
    protected $updateResults;

    /**
     * @param eLama\DirectApiV5\General\ClientsActionResult[] $updateResults
     */
    public function __construct(array $updateResults)
    {
        $this->updateResults = $updateResults;
    }

    /**
     * @return eLama\DirectApiV5\General\ClientsActionResult[]
     */
    public function getUpdateResults()
    {
        return $this->updateResults;
    }

    /**
     * @param eLama\DirectApiV5\General\ClientsActionResult[] $updateResults
     * @return self
     */
    public function setUpdateResults(array $updateResults)
    {
        $this->updateResults = $updateResults;
    
        return $this;
    }
}
