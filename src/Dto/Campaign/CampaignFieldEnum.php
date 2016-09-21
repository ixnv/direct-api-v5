<?php

namespace eLama\DirectApiV5\Dto\Campaign;

use eLama\DirectApiV5\Dto\General\Enum\BaseEnum;

class CampaignFieldEnum extends BaseEnum
{
    const __default = 'BlockedIps';

    const BlockedIps = 'BlockedIps';
    const ExcludedSites = 'ExcludedSites';
    const Currency = 'Currency';
    const DailyBudget = 'DailyBudget';
    const Notification = 'Notification';
    const EndDate = 'EndDate';
    const Funds = 'Funds';
    const ClientInfo = 'ClientInfo';
    const Id = 'Id';
    const Name = 'Name';
    const NegativeKeywords = 'NegativeKeywords';
    const RepresentedBy = 'RepresentedBy';
    const StartDate = 'StartDate';
    const Statistics = 'Statistics';
    const State = 'State';
    const Status = 'Status';
    const StatusPayment = 'StatusPayment';
    const StatusClarification = 'StatusClarification';
    const SourceId = 'SourceId';
    const TimeTargeting = 'TimeTargeting';
    const TimeZone = 'TimeZone';
    const Type = 'Type';
}
