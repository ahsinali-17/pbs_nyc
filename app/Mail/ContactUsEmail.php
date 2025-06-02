<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactUsEmail extends Mailable
{
    use Queueable;
    use SerializesModels;
    protected $content;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email, $phone,$subject, $details)
    {
        //
        $this->content = [];
        $this->content["name"] = $name;
        $this->content["email"] = $email;
        $this->content["phone"] = $phone;
        $this->content["subject"] = $subject;
        $this->content["details"] = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $content = $this->content;
        return $this->subject($this->content["subject"])->view('mails.contactus', compact('content'));
    }
}
