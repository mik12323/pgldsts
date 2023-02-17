<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class emailProject extends Mailable
{
    use Queueable, SerializesModels;
    public $user, $transaction, $project;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $project)
    {
        $this->user = $user;
        $this->project = $project;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(){
        return $this->markdown('mail.project');
    }
}
