<?php

namespace App\Mail;

use App\Models\Ticket;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TicketOpened extends Mailable
{
    use Queueable, SerializesModels;
    public $ticket;
    /**
     * Create a new message instance.
     */
    public function __construct()
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

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Ticket Opened',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'view.name',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
