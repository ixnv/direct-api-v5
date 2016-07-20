<?php

namespace eLama\DirectApiV5\Dto\AdExtensions;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class AdExtensionsSelectionCriteria
{

    /**
     * @JMS\Type("array<integer>")
     *
     * @var int[] $Ids
     */
    private $Ids;

    /**
     * @JMS\Type("array<string>")
     *
     * @var AdExtensionTypeEnum[] $Types
     */
    private $Types;

    /**
     * @JMS\Type("array<string>")
     *
     * @var AdExtensionStateSelectionEnum[] $States
     */
    private $States;

    /**
     * @JMS\Type("array<string>")
     *
     * @var ExtensionStatusSelectionEnum[] $Statuses
     */
    private $Statuses;

    /**
     * @JMS\Type("string")
     *
     * @var string $ModifiedSince
     */
    private $ModifiedSince;

    /**
     * AdExtensionsSelectionCriteria constructor.
     *
     * @param \int[] $Ids
     */
    public function __construct(array $Ids)
    {
        $this->Ids = $Ids;
    }

    /**
     * @return int[]
     */
    public function getIds()
    {
      return $this->Ids;
    }

    /**
     * @param int[] $Ids
     * @return \eLama\DirectApiV5\Dto\AdExtensions\AdExtensionsSelectionCriteria
     */
    public function setIds(array $Ids = null)
    {
      $this->Ids = $Ids;
      return $this;
    }

    /**
     * @return AdExtensionTypeEnum[]
     */
    public function getTypes()
    {
      return $this->Types;
    }

    /**
     * @param AdExtensionTypeEnum[] $Types
     * @return \eLama\DirectApiV5\Dto\AdExtensions\AdExtensionsSelectionCriteria
     */
    public function setTypes(array $Types = null)
    {
      $this->Types = $Types;
      return $this;
    }

    /**
     * @return AdExtensionStateSelectionEnum[]
     */
    public function getStates()
    {
      return $this->States;
    }

    /**
     * @param AdExtensionStateSelectionEnum[] $States
     * @return \eLama\DirectApiV5\Dto\AdExtensions\AdExtensionsSelectionCriteria
     */
    public function setStates(array $States = null)
    {
      $this->States = $States;
      return $this;
    }

    /**
     * @return ExtensionStatusSelectionEnum[]
     */
    public function getStatuses()
    {
      return $this->Statuses;
    }

    /**
     * @param ExtensionStatusSelectionEnum[] $Statuses
     * @return \eLama\DirectApiV5\Dto\AdExtensions\AdExtensionsSelectionCriteria
     */
    public function setStatuses(array $Statuses = null)
    {
      $this->Statuses = $Statuses;
      return $this;
    }

    /**
     * @return string
     */
    public function getModifiedSince()
    {
      return $this->ModifiedSince;
    }

    /**
     * @param string $ModifiedSince
     * @return \eLama\DirectApiV5\Dto\AdExtensions\AdExtensionsSelectionCriteria
     */
    public function setModifiedSince($ModifiedSince = null)
    {
      $this->ModifiedSince = $ModifiedSince;
      return $this;
    }

}
