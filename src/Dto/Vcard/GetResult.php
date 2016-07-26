<?php

namespace eLama\DirectApiV5\Dto\Vcard;

use eLama\DirectApiV5\Dto\General\GetResultGeneral;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\AccessType("public_method")
 */
class GetResult extends GetResultGeneral
{

    /**
     * @JMS\Type("array<eLama\DirectApiV5\Dto\Vcard\VCardGetItem>")
     *
     * @var VCardGetItem[] $VCards
     */
    private $VCards = [];

    /**
     * @param VCardGetItem[] $VCardGetItem
     */
    public function __construct(array $VCardGetItem = null)
    {
        $this->VCards = $VCardGetItem;
    }

    /**
     * @return VCardGetItem[]
     */
    public function getVCards()
    {
        return $this->VCards === null ? [] : $this->VCards;
    }

    /**
     * @param VCardGetItem[] $VCards
     * @return GetResult
     */
    public function setVCards(array $VCards)
    {
        $this->VCards = $VCards;

        return $this;
    }

    /**
     * @return VCardGetItem[]
     */
    public function getItems()
    {
        return $this->getVCards();
    }
}
