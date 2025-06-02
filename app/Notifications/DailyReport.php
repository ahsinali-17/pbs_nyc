<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DailyReport extends Notification implements ShouldQueue
{
    use Queueable;

    protected $alerts;

    protected $user;

    protected $date;

    protected $pdf;

    /**
     * Create a new notification instance.
     *
     * @param $alerts
     * @param $user
     */
    public function __construct($alerts, $user, $date, $pdf = null)
    {
        $this->user = $user;
        $this->alerts = $alerts;
        $this->date = $date;
        $this->pdf = base64_encode($pdf->output());

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
        if (sizeof($this->alerts) > 0) {
            return ['mail', 'database'];
        }
        return [];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('PBS.nyc - Daily Report for Alerts')
            ->markdown('mails.daily-report', ['alerts' => $this->alerts, 'user' => $this->user, 'date' => $this->date])
            ->attachData(base64_decode($this->pdf), 'report.pdf', ['mime' => 'application/pdf',]);
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
            'alerts' => $this->alerts,
        ];
    }
}
