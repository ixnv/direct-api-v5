<?php

namespace eLama\DirectApiV5\Dto\Keywordbids;

use JMS\Serializer\Annotation as JMS;

class KeywordBids extends DirectBaseClient
{

    /**
     * @param GetRequest $parameters
     * @return GetResponse
     */
    public function get(GetRequest $parameters)
    {
      return $this->call('get', array($parameters));
    }

    /**
     * @param SetRequest $parameters
     * @return SetResponse
     */
    public function set(SetRequest $parameters)
    {
      return $this->call('set', array($parameters));
    }

}
