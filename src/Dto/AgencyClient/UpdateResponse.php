<?php

namespace eLama\DirectApiV5\Dto\AgencyClient;

use JMS\Serializer\Annotation as JMS;

class UpdateResponse
{
    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\AgencyClient\ClientsActionResult>")
     *
     * @var ClientsActionResult[] $updateResults
     */
    private $updateResults;

    /**
     * @param ClientsActionResult[] $updateResults
     */
    public function __construct(array $updateResults)
    {
        $this->updateResults = $updateResults;
    }

    /**
     * @return ClientsActionResult[]
     */
    public function getUpdateResults()
    {
        return $this->updateResults;
    }

    /**
     * @param ClientsActionResult[] $updateResults
     * @return self
     */
    public function setUpdateResults(array $updateResults)
    {
        $this->updateResults = $updateResults;
    
        return $this;
    }
}
