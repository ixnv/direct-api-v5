<?php

namespace eLama\DirectApiV5\Service;

use eLama\DirectApiV5\Dto\General\IdsCriteria;
use eLama\DirectApiV5\Dto\Sitelink;
use eLama\DirectApiV5\Dto\Sitelink\SitelinksSetAddItem;
use eLama\DirectApiV5\RequestBody\AddSitelinkRequestBody;
use eLama\DirectApiV5\RequestBody\GetSitelinkRequestBody;
use GuzzleHttp\Promise\PromiseInterface;

class SitelinkService extends Service
{
    /**
     * @param int[] $sitelinksSetIds
     * @return PromiseInterface
     * @see GetResponseBody
     */
    public function getSitelinksSets(array $sitelinksSetIds)
    {
        \Assert\that($sitelinksSetIds)->notEmpty();

        $requestBody = new GetSitelinkRequestBody(
            (new IdsCriteria())->setIds($sitelinksSetIds)
        );

        return $this->driver->call($requestBody);
    }

    /**
     * @param SitelinksSetAddItem[] $sitelinksSets
     * @return PromiseInterface
     * @see AddResponseBody
     */
    public function addSitelinksSets(array $sitelinksSets)
    {
        \Assert\thatAll($sitelinksSets)->isInstanceOf(SitelinksSetAddItem::class);

        $requestBody = new AddSitelinkRequestBody(new Sitelink\AddRequest($sitelinksSets));

        return $this->driver->call($requestBody);
    }
}
