<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class notif_reset_password extends Mailable
{
    use Queueable, SerializesModels;

    public $reset;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($reset)
    {
        $this->reset = $reset;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Notifikasi Keamanan')
                    ->view('emails.notif_reset');
        // return $this->view('view.name');
    }
}
