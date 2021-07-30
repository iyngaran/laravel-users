<?php

namespace Iyngaran\User\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeMail extends Mailable
{
    use Queueable;
    use SerializesModels;

    protected $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function build(): self
    {
        return $this->markdown('emails.users.welcome', [
            'user' => $this->user,
        ])->subject("Welcome to #TeamTees! Start to design your own Tees & Hoodies now!");
    }
}
