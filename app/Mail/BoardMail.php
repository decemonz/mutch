<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;


class BoardMail extends Mailable
{
    use Queueable, SerializesModels;

       public $board;

    /**
     * Create a new message instance.
     *
     * @param $board
     */



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
        ->from('match@gmail.com')
        ->subject('応募がありました')
        ->view('mail.board')
        ->with(['board' => $this->board]);

    }
}
