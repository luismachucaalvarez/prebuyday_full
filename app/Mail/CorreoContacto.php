<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CorreoContacto extends Mailable
{
    use Queueable, SerializesModels;
    public $mailData;

    /**
     * Create a new message instance.
     *
     * @param $mailData
     */
    public function __construct($mailData)
    {
       $this->mailData=$mailData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        /*return $this->subject($this->email_asunto)
            ->view('Email.correoContacto');*/
            //->from($this->mailData['from'], $this->mailData['from']);
        return $this->markdown('Email.correoContacto')
            ->with('mailData', $this->mailData);
    }
}
