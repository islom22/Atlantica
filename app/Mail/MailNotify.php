<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailNotify extends Mailable
{
    use Queueable, SerializesModels;

    public $data=[];

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data= $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        dd($this->from('yorqinzuckerberg@gmail.com', 'Cambo Tutorial')
        ->subject($this->data["subject"])
                    ->view('emails.subscribe')->with("data",$this->data));
        return $this->from('yorqinzuckerberg@gmail.com', 'Cambo Tutorial')
        ->subject($this->data["subject"])
                    ->view('emails.subscribe')->with("data",$this->data);
    }
}
