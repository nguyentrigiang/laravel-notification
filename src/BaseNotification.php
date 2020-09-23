<?php

namespace GiangNT\LaravelNotification;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

class BaseNotification extends Notification
{
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->setId();
    }

    public function setId()
    {
        $statement = \DB::select("SHOW TABLE STATUS LIKE 'notifications'");
        $nextId = $statement[0]->Auto_increment;

        $this->id = $nextId;
    }
}
