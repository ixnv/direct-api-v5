<?php

namespace eLama\DirectApiV5\Dto\Ad;

use JMS\Serializer\Annotation as JMS;

use eLama\DirectApiV5\Dto\General\GetRequestGeneral;

/**
 * @JMS\AccessType("public_method")
 */
class GetRequest extends GetRequestGeneral
{
    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Ad\AdsSelectionCriteria")
     *
     * @var AdsSelectionCriteria $SelectionCriteria
     */
    private $SelectionCriteria;

    /**
     * @JMS\Type("array<string>")
     *
     * @var string[] $FieldNames
     */
    private $FieldNames;

    /**
     * @JMS\Type("array<string>")
     *
     * @var string[] $TextAdFieldNames
     */
    private $TextAdFieldNames;

    /**
     * @JMS\Type("array<string>")
     *
     * @var string[] $MobileAppAdFieldNames
     */
    private $MobileAppAdFieldNames;

    /**
     * @JMS\Type("array<string>")
     *
     * @var string[] $DynamicTextAdFieldNames
     */
    private $DynamicTextAdFieldNames;

    /**
     * @JMS\Type("array<string>")
     *
     * @var string[] $TextImageAdFieldNames
     */
    private $TextImageAdFieldNames;

    /**
     * @JMS\Type("array<string>")
     *
     * @var string[] $MobileAppImageAdFieldNames
     */
    private $MobileAppImageAdFieldNames;

    /**
     * @param AdsSelectionCriteria $SelectionCriteria
     * @param string[] $FieldNames
     * @param string[] $TextAdFieldNames
     * @param string[] $MobileAppAdFieldNames
     * @param string[] $DynamicTextAdFieldNames
     * @param string[] $TextImageAdFieldNames
     * @param string[] $MobileAppImageAdFieldNames
     */
    public function __construct(
        AdsSelectionCriteria $SelectionCriteria,
        array $FieldNames,
        array $TextAdFieldNames = null,
        array $MobileAppAdFieldNames = null,
        array $DynamicTextAdFieldNames = null,
        array $TextImageAdFieldNames = null,
        array $MobileAppImageAdFieldNames = null
    ) {
        $this->SelectionCriteria = $SelectionCriteria;
        $this->FieldNames = $FieldNames;
        $this->TextAdFieldNames = $TextAdFieldNames;
        $this->MobileAppAdFieldNames = $MobileAppAdFieldNames;
        $this->DynamicTextAdFieldNames = $DynamicTextAdFieldNames;
        $this->TextImageAdFieldNames = $TextImageAdFieldNames;
        $this->MobileAppImageAdFieldNames = $MobileAppImageAdFieldNames;
    }

    /**
     * @return AdsSelectionCriteria
     */
    public function getSelectionCriteria()
    {
        return $this->SelectionCriteria;
    }

    /**
     * @param AdsSelectionCriteria $SelectionCriteria
     * @return \eLama\DirectApiV5\Dto\Ad\GetRequest
     */
    public function setSelectionCriteria(AdsSelectionCriteria $SelectionCriteria)
    {
        $this->SelectionCriteria = $SelectionCriteria;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getFieldNames()
    {
        return $this->FieldNames;
    }

    /**
     * @param string[] $FieldNames
     * @return \eLama\DirectApiV5\Dto\Ad\GetRequest
     */
    public function setFieldNames(array $FieldNames)
    {
        $this->FieldNames = $FieldNames;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getTextAdFieldNames()
    {
        return $this->TextAdFieldNames;
    }

    /**
     * @param string[] $TextAdFieldNames
     * @return \eLama\DirectApiV5\Dto\Ad\GetRequest
     */
    public function setTextAdFieldNames(array $TextAdFieldNames)
    {
        $this->TextAdFieldNames = $TextAdFieldNames;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getMobileAppAdFieldNames()
    {
        return $this->MobileAppAdFieldNames;
    }

    /**
     * @param string[] $MobileAppAdFieldNames
     * @return \eLama\DirectApiV5\Dto\Ad\GetRequest
     */
    public function setMobileAppAdFieldNames(array $MobileAppAdFieldNames)
    {
        $this->MobileAppAdFieldNames = $MobileAppAdFieldNames;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getDynamicTextAdFieldNames()
    {
        return $this->DynamicTextAdFieldNames;
    }

    /**
     * @param string[] $DynamicTextAdFieldNames
     * @return \eLama\DirectApiV5\Dto\Ad\GetRequest
     */
    public function setDynamicTextAdFieldNames(array $DynamicTextAdFieldNames)
    {
        $this->DynamicTextAdFieldNames = $DynamicTextAdFieldNames;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getTextImageAdFieldNames()
    {
        return $this->TextImageAdFieldNames;
    }

    /**
     * @param string[] $TextImageAdFieldNames
     * @return GetRequest
     */
    public function setTextImageAdFieldNames(array $TextImageAdFieldNames = null)
    {
        $this->TextImageAdFieldNames = $TextImageAdFieldNames;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getMobileAppImageAdFieldNames()
    {
        return $this->MobileAppImageAdFieldNames;
    }

    /**
     * @param string[] $MobileAppImageAdFieldNames
     * @return GetRequest
     */
    public function setMobileAppImageAdFieldNames(array $MobileAppImageAdFieldNames = null)
    {
        $this->MobileAppImageAdFieldNames = $MobileAppImageAdFieldNames;

        return $this;
    }
}
