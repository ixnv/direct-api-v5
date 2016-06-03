<?php

namespace eLama\DirectApiV5\Dto\Changes;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class CheckRequest
{

    /**
     * @JMS\Type("array<integer>")
     *
     * @var int $CampaignIds
     */
    private $CampaignIds;

    /**
     * @JMS\Type("array<integer>")
     *
     * @var int $AdGroupIds
     */
    private $AdGroupIds;

    /**
     * @JMS\Type("array<integer>")
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
     * @JMS\Type("array<string>")
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
        $this->setTimestamp($Timestamp);
        $this->FieldNames = $FieldNames ?:
            [
                CheckFieldEnum::CampaignIds,
                CheckFieldEnum::CampaignsStat,
                CheckFieldEnum::AdGroupIds,
                CheckFieldEnum::AdIds
            ];
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
     * @param string|\DateTimeImmutable $Timestamp
     * @return \eLama\DirectApiV5\Dto\Changes\CheckRequest
     */
    public function setTimestamp($Timestamp)
    {
        if ($Timestamp instanceof \DateTimeImmutable) {
            $Timestamp = $Timestamp->setTimezone(new \DateTimeZone('UTC'))->format('Y-m-d\TH:i:s\Z');
        }

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
