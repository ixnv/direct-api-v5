<?php


namespace eLama\DirectApiV5\RequestBody;

use eLama\DirectApiV5\Dto\General\LimitOffset;
use eLama\DirectApiV5\Dto\Keyword\GetResponseBody;
use eLama\DirectApiV5\Dto\Keyword\GetRequest;
use eLama\DirectApiV5\Dto\Keyword\KeywordFieldEnum;
use eLama\DirectApiV5\Dto\Keyword\KeywordsSelectionCriteria;

class GetKeywordsRequestBody extends GetRequestBody
{
    public function __construct(KeywordsSelectionCriteria $selectionCriteria, LimitOffset $page = null) {
        $this->request = new GetRequest(
            $selectionCriteria,
            $page,
            KeywordFieldEnum::values()
        );
    }

    public function resource()
    {
        return 'keywords';
    }

    public function params()
    {
        return $this->request;
    }

    public function resultClass()
    {
        return GetResponseBody::class;
    }
}
