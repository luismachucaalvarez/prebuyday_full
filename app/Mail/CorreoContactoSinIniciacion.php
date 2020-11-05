<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CorreoContactoSinIniciacion extends Mailable
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
        $this->mailData = $mailData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->view('view.name');
        return $this->markdown('Email.CorreoContactoSinIniciacion')->subject('Buyday.cl - Bienvenido nuevo vendedor :D')
            ->with('mailData', $this->mailData);
    }
}
