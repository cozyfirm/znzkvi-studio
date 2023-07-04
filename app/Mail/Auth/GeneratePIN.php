<?php

namespace App\Mail\Auth;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class GeneratePIN extends Mailable
{
    use Queueable, SerializesModels;
    public $_username, $_email, $_pin;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($username, $email, $pin){
        $this->_username = $username;
        $this->_email = $email;
        $this->_pin = $pin;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(){
        return $this->subject("Restart password")->replyTo("no-reply@colors.ba")->markdown('templates.email-templates.auth.restart-password');
    }
}
