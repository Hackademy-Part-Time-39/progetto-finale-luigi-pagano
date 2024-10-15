<?php


namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CareerRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $role;
    public $email;
    public $msg;

    public function __construct($role, $email)
    {
        $this->role = $role;
        $this->email = $email;
        
        
    }

    public function build()
    {
        return $this->subject('Nuova Richiesta di Candidatura')
                    ->view('mail.career-request-mail');
    }
}
