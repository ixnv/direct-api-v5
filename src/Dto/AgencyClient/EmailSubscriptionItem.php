<?php

namespace eLama\DirectApiV5\Dto\AgencyClient;

use eLama\DirectApiV5\Dto\AgencyClient\Enum\EmailSubscriptionEnum;
use eLama\DirectApiV5\Dto\General\Enum\YesNoEnum;

class EmailSubscriptionItem
{
    /**
     * @var EmailSubscriptionEnum $option
     */
    private $option;

    /**
     * @var YesNoEnum $value
     */
    private $value;

    /**
     * @param EmailSubscriptionEnum $option
     * @param YesNoEnum $value
     */
    public function __construct(EmailSubscriptionEnum $option, YesNoEnum $value)
    {
        $this->option = $option;
        $this->value = $value;
    }

    /**
     * @return EmailSubscriptionEnum
     */
    public function getOption()
    {
        return $this->option;
    }

    /**
     * @param EmailSubscriptionEnum $option
     * @return self
     */
    public function setOption(EmailSubscriptionEnum $option)
    {
        $this->option = $option;
    
        return $this;
    }

    /**
     * @return YesNoEnum
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param YesNoEnum $value
     * @return self
     */
    public function setValue(YesNoEnum $value)
    {
        $this->value = $value;
    
        return $this;
    }
}
