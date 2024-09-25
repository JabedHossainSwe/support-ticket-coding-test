<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TicketOpened extends Mailable
{
    use Queueable, SerializesModels;

    public $ticket;

    /**
     * Create a new message instance.
     *
     * @param \App\Models\Ticket $ticket
     */
    public function __construct($ticket)
    {
        $this->ticket = $ticket;
    }

    public function build()
    {
        return $this->subject('New Support Ticket Opened')
            ->view('emails.ticket_opened')
            ->with([
                'ticket' => $this->ticket,
            ]);
    }
}
