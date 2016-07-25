<?php

namespace eLama\DirectApiV5\Dto\Vcard;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class GetResponse
{

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Vcard\VCardGetItem")
     *
     * @var VCardGetItem $VCards
     */
    private $VCards;

    /**
     * @param VCardGetItem $VCards
     */
    public function __construct(VCardGetItem $VCards = null)
    {
        $this->VCards = $VCards;
    }

    /**
     * @return VCardGetItem
     */
    public function getVCards()
    {
        return $this->VCards;
    }

    /**
     * @param VCardGetItem $VCards
     * @return \eLama\DirectApiV5\Dto\Vcard\GetResponse
     */
    public function setVCards(VCardGetItem $VCards)
    {
        $this->VCards = $VCards;

        return $this;
    }
}
