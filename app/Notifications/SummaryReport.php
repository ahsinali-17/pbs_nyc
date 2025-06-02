<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;

class SummaryReport extends Notification implements ShouldQueue
{
    use Queueable;

    protected $user;
//    protected $pdf;

    /**
     * Create a new notification instance.
     *
     * @param $alerts
     * @param $user
     */
    public function __construct($user)
    {
        $this->user = $user;
//        Log::debug("pdf->output started" . now());
//        $path = public_path('pdfstorage/' . $user->id . '-' . now()->format('YmdHi') . '.pdf');
//        $pdf->save($path);
//        $this->pdf = $path;
//        $pdf->save('pdficintest/'.$user->id.''.'deneme.pdf');
//        $this->pdf = base64_encode($pdf->output());
//        Log::debug("pdf->output finished" . now());

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
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {

//        ini_set('memory_limit', '4096M');

        $user = $this->user;
//        $pdf = $this->pdf;
        $email = (new MailMessage())
            ->from('alerts@pbs.nyc', 'PBS.NYC | Alerts')
            ->subject('PBS.NYC | Summary Report of Properties')->view('mails.summary-mail', compact('user'));
//        $email->attach($this->pdf, ['as' => 'report.pdf', 'mime' => 'application/pdf']);
//            ->attachData(base64_decode($this->pdf), 'report.pdf', ['mime' => 'application/pdf',]);
        return $email;
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
//            'properties' => $this->user->properties,
        ];
    }
}
