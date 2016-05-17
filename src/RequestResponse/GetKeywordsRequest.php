<?php


namespace eLama\DirectApiV5\RequestResponse;

use eLama\DirectApiV5\Dto\Keyword\GetOperationResponse;
use eLama\DirectApiV5\Dto\Keyword\GetRequest;
use eLama\DirectApiV5\Dto\Keyword\KeywordFieldEnum;
use eLama\DirectApiV5\Dto\Keyword\KeywordsSelectionCriteria;

class GetKeywordsRequest extends GetRequestGeneral
{
    /** @var GetRequest */
    private $request;

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

    protected function params()
    {
        return $this->request;
    }

    public function resultClass()
    {
        return GetOperationResponse::class;
    }
}
