<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use jeremykenedy\LaravelLogger\App\Http\Traits\ActivityLogger;
use LaravelFCM\Facades\FCM;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;

class AlertNotification extends Notification implements ShouldQueue
{

    use ActivityLogger;

    use Queueable;

    protected $item;

    protected $user;

    protected $property;

    protected $changes;

    /**
     * Create a new notification instance.
     *
     * @param $item
     * @param $user
     * @param $property
     */
    public function __construct($item, $user, $property, $changes = false)
    {
        $this->item = $item->setRelations([]);
        $this->user = $user->setRelations([]);
        $this->property = $property->setRelations([]);
        $this->changes = $changes;


        if ($this->changes) {
            foreach ($this->changes as $attr => $value) {
                $this->changes[$attr] = $this->item->getOriginal($attr);
                $this->activity("updated field $attr from {$this->item->getOriginal($attr)} to {$this->item->$attr}");
            }
        }

        //
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
        return (new MailMessage())
            ->from('alerts@pbs.nyc', 'PBS.NYC | Alerts')
            ->subject($this->property->getAddressOnlyWithHouseStreet() . " - " . $this->item->getMailSubject($this->changes ? true : false))
            ->view($this->item->mailview, ['item' => $this->item, 'user' => $this->user, 'property' => $this->property, 'changes' => $this->changes, 'subject' => $this->item->getMailSubject($this->changes ? true : false)]);
    }

    public function toFCM($notifiable)
    {
        $token = $this->user->fcm_token;
        if ($token) {
            $notificationBuilder = new PayloadNotificationBuilder();
            $notificationBuilder->setTitle($this->item->subject)
                ->setBody($this->property->getAddressWithoutBin());

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
            'item' => $this->item,
            'user' => $this->user,
            'property' => $this->property->getAddressWithoutBin(),
            'changes' => $this->changes,
            'subject' => $this->item->getMailSubject($this->changes ? true : false)
        ];
    }
}
