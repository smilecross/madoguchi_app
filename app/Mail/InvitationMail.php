<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvitationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $invite_url;
    public $companyName;

    /**
     * Create a new message instance.
     */
    public function __construct($invite_url, $companyName)
    {
        $this->invite_url = $invite_url;
        $this->companyName = $companyName;
    }

    public function build()
    {
        return $this->subject('招待メール')
        ->view('emails.invite_mail');
    }
}
