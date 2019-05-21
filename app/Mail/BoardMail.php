<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use Sichikawa\LaravelSendgridDriver\SendGrid;

class BoardMail extends Mailable
{
    use Queueable, SerializesModels;
    use SendGrid;
    

    /**
     * Create a new message instance.
     *
     * @return void
     */

     public $board;

    public function __construct($board)
    {
        //
        $this->board = $board;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->from('gg@gmail.com')
        ->subject('応募がありました')
        ->view('mail.board')
        ->with(['board' => $this->board]);

    }
}
