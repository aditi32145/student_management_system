<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class UserCredentialMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $password;
    public $role;

    public function __construct($name, $email, $password, $role)
    {
        $this->name     = $name;
        $this->email    = $email;
        $this->password = $password;
        $this->role     = $role;
    }

    public function build()
    {
        return $this->subject('Welcome to Our Institution')
                    ->view('emails.credentials');
    }
}

