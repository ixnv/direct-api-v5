<?php

namespace eLama\DirectApiV5\Dto\Vcard;

use eLama\DirectApiV5\Dto\General\BaseEnum;

class VCardFieldEnum extends BaseEnum
{
    const __default = 'Id';

    const Id = 'Id';
    const Country = 'Country';
    const City = 'City';
    const Street = 'Street';
    const House = 'House';
    const Building = 'Building';
    const Apartment = 'Apartment';
    const CompanyName = 'CompanyName';
    const ExtraMessage = 'ExtraMessage';
    const ContactPerson = 'ContactPerson';
    const ContactEmail = 'ContactEmail';
    const MetroStationId = 'MetroStationId';
    const CampaignId = 'CampaignId';
    const Ogrn = 'Ogrn';
    const WorkTime = 'WorkTime';
    const InstantMessenger = 'InstantMessenger';
    const Phone = 'Phone';
    const PointOnMap = 'PointOnMap';
}
