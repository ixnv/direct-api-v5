<?php

namespace eLama\DirectApiV5\RequestBody;

use eLama\DirectApiV5\Dto\AgencyClient\AgencyClientsSelectionCriteria;
use eLama\DirectApiV5\Dto\AgencyClient\GetRequest;
use eLama\DirectApiV5\Dto\AgencyClient\GetResponseBody;

class GetAgencyClientsRequestBody extends GetRequestBody
{
    public function __construct(AgencyClientsSelectionCriteria $selectionCriteria)
    {
        $this->request = new GetRequest(
            $selectionCriteria,
            [
                "AccountQuality",
                "Archived",
                "ClientId",
                "ClientInfo",
                "CountryId",
                "CreatedAt",
                "Currency",
                "Grants",
                "Login",
                "Notification",
                "OverdraftSumAvailable",
                "Phone",
                "Representatives",
                "Restrictions",
                "Settings",
                "Type",
                "VatRate"
            ]
        );
    }

    public function resource()
    {
        return 'agencyclients';
    }

    /**
     * @return GetRequest
     */
    public function params()
    {
        return $this->request;
    }

    public function resultClass()
    {
        return GetResponseBody::class;
    }
}
