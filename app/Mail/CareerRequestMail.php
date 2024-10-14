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
    public $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($role, $email, $message)
    {
        $this->role = $role;
        $this->email = $email;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Nuova Richiesta di Candidatura')
                    ->view('mail.career-request-mail');
    }
}
