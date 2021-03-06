<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class FirstAccess extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $password)
    {
        $this->user = $user;
        $this->password = $password;
        // $this->url = $_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];
        $this->url = 'https://'.$_SERVER["HTTP_HOST"];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Bem vindo ao sistema NitSys')
            ->view('email.firstAccess')
            ->with([
                'user' => $this->user,
                'password' => $this->password,
                'url' => $this->url,
            ]);
    }
}
