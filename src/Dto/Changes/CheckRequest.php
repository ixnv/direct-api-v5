<?php

namespace eLama\DirectApiV5\Dto\Changes;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class CheckRequest
{

    /**
     * @JMS\Type("integer")
     *
     * @var int $CampaignIds
     */
    private $CampaignIds;

    /**
     * @JMS\Type("integer")
     *
     * @var int $AdGroupIds
     */
    private $AdGroupIds;

    /**
     * @JMS\Type("integer")
     *
     * @var int $AdIds
     */
    private $AdIds;

    /**
     * @JMS\Type("string")
     *
     * @var string $Timestamp
     */
    private $Timestamp;

    /**
     * @JMS\Type("string")
     *
     * @var CheckFieldEnum $FieldNames
     */
    private $FieldNames;

    /**
     * @param int $CampaignIds
     * @param int $AdGroupIds
     * @param int $AdIds
     * @param string $Timestamp
     * @param CheckFieldEnum $FieldNames
     */
    public function __construct($CampaignIds = null, $AdGroupIds = null, $AdIds = null, $Timestamp = null, $FieldNames = null)
    {
      $this->CampaignIds = $CampaignIds;
      $this->AdGroupIds = $AdGroupIds;
      $this->AdIds = $AdIds;
      $this->Timestamp = $Timestamp;
      $this->FieldNames = $FieldNames;
    }

    /**
     * @return int
     */
    public function getCampaignIds()
    {
      return $this->CampaignIds;
    }

    /**
     * @param int $CampaignIds
     * @return \eLama\DirectApiV5\Dto\Changes\CheckRequest
     */
    public function setCampaignIds($CampaignIds)
    {
      $this->CampaignIds = $CampaignIds;
      return $this;
    }

    /**
     * @return int
     */
    public function getAdGroupIds()
    {
      return $this->AdGroupIds;
    }

    /**
     * @param int $AdGroupIds
     * @return \eLama\DirectApiV5\Dto\Changes\CheckRequest
     */
    public function setAdGroupIds($AdGroupIds)
    {
      $this->AdGroupIds = $AdGroupIds;
      return $this;
    }

    /**
     * @return int
     */
    public function getAdIds()
    {
      return $this->AdIds;
    }

    /**
     * @param int $AdIds
     * @return \eLama\DirectApiV5\Dto\Changes\CheckRequest
     */
    public function setAdIds($AdIds)
    {
      $this->AdIds = $AdIds;
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
     * @return \eLama\DirectApiV5\Dto\Changes\CheckRequest
     */
    public function setTimestamp($Timestamp)
    {
      $this->Timestamp = $Timestamp;
      return $this;
    }

    /**
     * @return CheckFieldEnum
     */
    public function getFieldNames()
    {
      return $this->FieldNames;
    }

    /**
     * @param CheckFieldEnum $FieldNames
     * @return \eLama\DirectApiV5\Dto\Changes\CheckRequest
     */
    public function setFieldNames($FieldNames)
    {
      $this->FieldNames = $FieldNames;
      return $this;
    }

}
