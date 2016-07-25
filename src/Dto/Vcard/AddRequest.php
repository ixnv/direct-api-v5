<?php

namespace eLama\DirectApiV5\Dto\Vcard;

use JMS\Serializer\Annotation as JMS;


/**
 * @JMS\AccessType("public_method")
 */
class AddRequest
{

    /**
     * @JMS\Type("eLama\DirectApiV5\Dto\Vcard\VCardAddItem")
     *
     * @var VCardAddItem $VCards
     */
    private $VCards;

    /**
     * @param VCardAddItem $VCards
     */
    public function __construct(VCardAddItem $VCards = null)
    {
        $this->VCards = $VCards;
    }

    /**
     * @return VCardAddItem
     */
    public function getVCards()
    {
        return $this->VCards;
    }

    /**
     * @param VCardAddItem $VCards
     * @return \eLama\DirectApiV5\Dto\Vcard\AddRequest
     */
    public function setVCards(VCardAddItem $VCards)
    {
        $this->VCards = $VCards;

        return $this;
    }

}
