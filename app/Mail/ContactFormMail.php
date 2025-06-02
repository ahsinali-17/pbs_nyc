<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $contactData;

    /**
     * Create a new message instance.
     *
     * @param array $contactData
     * @return void
     */
    public function __construct(array $contactData)
    {
        $this->contactData = $contactData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.contact-form')
            ->subject('New Contact Form Submission')
            ->with([
                'name' => $this->contactData['full_name'],
                'email' => $this->contactData['email'],
                'phone' => $this->contactData['phone'],
                'messageContent' => $this->contactData['message']
            ]);
    }
} 