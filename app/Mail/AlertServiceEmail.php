<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AlertServiceEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    protected $alertitem;
    protected $user;
    protected $property;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($alertitem, $user, $property)
    {
        $this->alertitem = $alertitem;
        $this->user = $user;
        $this->property = $property;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $item = $this->alertitem;
        $user = $this->user;
        $property = $this->property;
        return $this->from('alerts@pbs.nyc', 'PBS.NYC | Alerts')
            ->to($user->email)
            ->subject($property->getAddressOnlyWithHouseStreet()." - ".$this->item->getMailSubject())
            ->view($item->mailview, compact('item', 'user', 'property'));
    }
}
