<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use LaravelFCM\Facades\FCM;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;

class NewAlertNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $content;
    protected $user;
    protected $isNew;
    protected $subject;

    /**
     * Create a new notification instance.
     *
     * @param $item
     * @param $user
     * @param $property
     */
    public function __construct($user, $content, $subject, $isNew = true)
    {
        $this->content = $content;
        $this->user = $user;
        $this->isNew = $isNew;
        $this->subject = $subject;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
//        return new AlertServiceEmail($this, $user, $property);
        $content = $this->content;
        return (new MailMessage())
            ->from('alerts@pbs.nyc', 'PBS.NYC | Alerts')
            ->subject($this->subject)
            ->view('mails.alerts.afullalertemail', compact('content'));
    }

    public function toFCM($notifiable)
    {
        $token = $this->user->fcm_token;
        if ($token) {
            $notificationBuilder = new PayloadNotificationBuilder();
            $notificationBuilder->setTitle("New Alerts Received")
                ->setBody($this->subject);

            $optionBuilder = new OptionsBuilder();
            $optionBuilder->setTimeToLive(60 * 20);

            $dataBuilder = new PayloadDataBuilder();


            $option = $optionBuilder->build();
            $data = $dataBuilder->build();
            $notification = $notificationBuilder->build();
            $downstreamResponse = FCM::sendTo($token, null, $notification, null);

            return $downstreamResponse;
        }
        return false;
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'user' => $this->user,
            'isNew' => $this->isNew,
            'subject' =>$this->subject,
            'content' => $this->content
        ];
    }
}
