<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailSender extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $email = '';
    public $from = '';
    public $subject = '';
    public $blade  ='';
    public $data = '';
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $subject, $from, $blade=null, $data=null)
    {
        //
        $this->email = $email;
        $this->from = $from;
        $this->subject = $subject;
        $this->blade = $blade;
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            // ->from($this->from)
            ->subject($this->subject)
            ->view($this->blade?$this->blade:'email', compact('email', 'data'));
    }
}
