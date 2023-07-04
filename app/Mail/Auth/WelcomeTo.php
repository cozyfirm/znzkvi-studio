<?php

namespace App\Mail\Auth;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeTo extends Mailable{
    use Queueable, SerializesModels;

    public $_username, $_email;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($username, $email){
        $this->_username = $username;
        $this->_email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(){
        return $this->subject("Welcome")->replyTo("no-reply@colors.ba")->markdown('templates.email-templates.auth.welcome');
    }
}
