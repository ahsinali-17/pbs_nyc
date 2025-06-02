<?php

namespace App\Notifications;

use App\Models\DepCatsPermits;
use App\Models\DobNowFacadeFilings;
use App\Models\DobNowSafetyBoiler;
use App\Models\OtherInspections;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use jeremykenedy\LaravelLogger\App\Http\Traits\ActivityLogger;
use LaravelFCM\Facades\FCM;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;

class ReminderNotification extends Notification implements ShouldQueue
{
    use Queueable;

    protected $item;

    protected $user;

    protected $property;

    protected $changes;
    protected $expired;

    /**
     * Create a new notification instance.
     *
     * @param $item
     * @param $user
     * @param $property
     */
    public function __construct($property, $item, $expired = false)
    {
        $this->item = $item;
        $this->user = $property->user;
        $this->property = $property;
        $this->expired = $expired;
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

        $mailview = "";

        if ($this->item instanceof DobNowFacadeFilings) {
            $mailview = 'mails.reminders.facadeReminder';
        } elseif ($this->item instanceof DepCatsPermits) {
            $mailview = 'mails.reminders.depcatsReminder';
        } elseif ($this->item instanceof DobNowSafetyBoiler) {
            $mailview = 'mails.reminders.dobboilerReminder';
        } elseif ($this->item instanceof OtherInspections) {
            $mailview = 'mails.reminders.othersReminder';
        }

        return (new MailMessage())
            ->from('alerts@pbs.nyc', 'PBS.NYC | Reminders')
            ->subject($this->property->getAddressOnlyWithHouseStreet() . " - " . $this->item->getReminderSubject())
            ->view($mailview, ['item' => $this->item, 'user' => $this->user, 'property' => $this->property, 'expired' => $this->expired,'subject'=>$this->item->getReminderSubject()]);
    }

    public function toFCM($notifiable)
    {
//        $token = $this->user->fcm_token;
//        if ($token) {
//            $notificationBuilder = new PayloadNotificationBuilder();
//            $notificationBuilder->setTitle($this->item->subject)
//                ->setBody($this->property->getAddressWithoutBin());
//
//            $optionBuilder = new OptionsBuilder();
//            $optionBuilder->setTimeToLive(60 * 20);
//
//            $dataBuilder = new PayloadDataBuilder();
//
//
//            $option = $optionBuilder->build();
//            $data = $dataBuilder->build();
//            $notification = $notificationBuilder->build();
//            $downstreamResponse = FCM::sendTo($token, null, $notification, null);
//
//            return $downstreamResponse;
//        }
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
            'property' => $this->property
        ];
    }
}
