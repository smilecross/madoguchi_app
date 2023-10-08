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
    public $inviter;         // 招待を送信したユーザーの情報
    public $family_page_id;  // 招待に関連するファミリーページのID

    /**
     * Create a new message instance.
     * 
     * @param string $invite_url 招待URL
     * @param User $inviter 招待を送信したユーザーの情報
     * @param int $family_page_id 招待に関連するファミリーページのID
     */
    public function __construct($invite_url, $inviter, $family_page_id)
    {
        $this->invite_url = 'https://madoguchi.sakura.ne.jp/project/invitation/accept/' ;
        // $this->inviter = $inviter;
        $this->family_page_id = $family_page_id;
        $this->companyName = "LifeMoneyTech";
    }

    public function build()
    {
        return $this->subject('招待メール')
        ->view('emails.invite_mail');
    }
}
