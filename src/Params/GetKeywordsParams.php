<?php


namespace eLama\DirectApiV5\Params;

use eLama\DirectApiV5\Dto\General\LimitOffset;
use eLama\DirectApiV5\Dto\Keyword\GetOperationResponse;
use eLama\DirectApiV5\Dto\Keyword\GetRequest;
use eLama\DirectApiV5\Dto\Keyword\KeywordFieldEnum;
use eLama\DirectApiV5\Dto\Keyword\KeywordsSelectionCriteria;

class GetKeywordsParams extends GetParams
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

    public function params()
    {
        return $this->request;
    }

    public function resultClass()
    {
        return GetOperationResponse::class;
    }
}
