<?php

namespace GiangNT\LaravelNotification\Tests\Notification;

use GiangNT\LaravelNotification\BaseNotification;
use GiangNT\LaravelNotification\Channels\OnesignalChannel;

class UserRegisted extends BaseNotification
{
    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [OnesignalChannel::class];
    }

    /**
     * Get the webapp representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return WebappMessage
     */
    public function toOnesignal($notifiable)
    {
        return [
            'message' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
        ];
    }
}
