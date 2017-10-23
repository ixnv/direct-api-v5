<?php

namespace eLama\DirectApiV5\Dto\AgencyClient;

class ClientUpdateItem extends ClientBaseItem
{
    /**
     * @var NotificationUpdate $Notification
     */
    protected $Notification;

    /**
     * @var ClientSettingUpdateItem[] $Settings
     */
    protected $Settings;

    /**
     * @return NotificationUpdate
     */
    public function getNotification()
    {
        return $this->Notification;
    }

    /**
     * @param NotificationUpdate $Notification
     * @return self
     */
    public function setNotification(NotificationUpdate $Notification)
    {
        $this->Notification = $Notification;
    
        return $this;
    }

    /**
     * @return ClientSettingUpdateItem[]
     */
    public function getSettings()
    {
        return $this->Settings;
    }

    /**
     * @param ClientSettingUpdateItem[] $Settings
     * @return self
     */
    public function setSettings(array $Settings = null)
    {
        $this->Settings = $Settings;
    
        return $this;
    }
}
