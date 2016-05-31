<?php

namespace eLama\DirectApiV5\Dto\Changes;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class CheckResponse
{

    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\Changes\CheckResponseModified>")
     *
     * @var CheckResponseModified[] $Modified
     */
    private $Modified;

    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\Changes\CheckResponseIds>")
     *
     * @var CheckResponseIds[] $NotFound
     */
    private $NotFound;

    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\Changes\CheckResponseIds>")
     *
     * @var CheckResponseIds[] $Unprocessed
     */
    private $Unprocessed;

    /**
     * @JMS\Type("string")
     *
     * @var string $Timestamp
     */
    private $Timestamp;

    /**
     * @param CheckResponseModified[] $Modified
     * @param CheckResponseIds[] $NotFound
     * @param CheckResponseIds[] $Unprocessed
     * @param string $Timestamp
     */
    public function __construct(
        array $Modified = null,
        array $NotFound = null,
        array $Unprocessed = null,
        $Timestamp = null
    ) {
        $this->Modified = $Modified;
        $this->NotFound = $NotFound;
        $this->Unprocessed = $Unprocessed;
        $this->Timestamp = $Timestamp;
    }

    /**
     * @return CheckResponseModified[]
     */
    public function getModified()
    {
        return $this->Modified;
    }

    /**
     * @param CheckResponseModified[] $Modified
     * @return \eLama\DirectApiV5\Dto\Changes\CheckResponse
     */
    public function setModified(array $Modified)
    {
        $this->Modified = $Modified;

        return $this;
    }

    /**
     * @return CheckResponseIds[]
     */
    public function getNotFound()
    {
        return $this->NotFound;
    }

    /**
     * @param CheckResponseIds[] $NotFound
     * @return \eLama\DirectApiV5\Dto\Changes\CheckResponse
     */
    public function setNotFound(array $NotFound)
    {
        $this->NotFound = $NotFound;

        return $this;
    }

    /**
     * @return CheckResponseIds[]
     */
    public function getUnprocessed()
    {
        return $this->Unprocessed;
    }

    /**
     * @param CheckResponseIds[] $Unprocessed
     * @return \eLama\DirectApiV5\Dto\Changes\CheckResponse
     */
    public function setUnprocessed(array $Unprocessed)
    {
        $this->Unprocessed = $Unprocessed;

        return $this;
    }

    /**
     * @return string
     */
    public function getTimestamp()
    {
        return $this->Timestamp;
    }

    /**
     * @param string $Timestamp
     * @return \eLama\DirectApiV5\Dto\Changes\CheckResponse
     */
    public function setTimestamp($Timestamp)
    {
        $this->Timestamp = $Timestamp;

        return $this;
    }

}
