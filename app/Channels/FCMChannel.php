<?php

namespace App\Channels;

use Illuminate\Notifications\Notification;


class FCMChannel
{

    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toFCM($notifiable);
    }

}
