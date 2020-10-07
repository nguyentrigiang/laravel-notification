<?php

namespace GiangNT\LaravelNotification;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\DatabaseNotification;

class BaseNotification extends Notification
{
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        if (config('notification.notification_type_id') == 'int') {
            $this->setId();
        }
    }

    public function setId()
    {
        $notification = DatabaseNotification::first();
        $nextId = $notification ? ++$notification->id : 1;

        $this->id = $nextId;
    }
}
