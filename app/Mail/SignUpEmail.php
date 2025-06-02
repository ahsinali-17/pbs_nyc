<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SignUpEmail extends Mailable implements ShouldQueue
{
    use Queueable;
    use SerializesModels;
    public $content;

    /**
     * Create a new message instance.
     *
     * @param $name
     * @param $email
     * @param $password
     * @param $phone
     * @param $subject
     * @param $properties
     */
    public function __construct($name, $email,$password, $phone,$subject, $properties)
    {
        //
        $this->content = [];
        $this->content["name"] = $name;
        $this->content["email"] = $email;
        $this->content["password"] = $password;
        $this->content["phone"] = $phone;
        $this->content["subject"] = $subject;
        $this->content["properties"] = $properties;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $content = $this->content;
        return $this->from('noreply@pbs.nyc')->subject($this->content["subject"])->view('mails.first-signup-mail', compact('content'));
    }
}
