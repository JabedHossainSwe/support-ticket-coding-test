<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class TicketController extends Controller
{
    public function create()
    {
        return view('tickets.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'issue' => 'required|string|max:255',
        ]);

        $ticket = Ticket::create([
            'user_id' => auth()->id(),
            'issue' => $request->issue,
        ]);

        // Send email to admin (use Laravel Mail)
        Mail::to('admin@example.com')->send(new TicketOpened($ticket));

        return redirect()->route('tickets.index')->with('success', 'Ticket submitted successfully.');
    }

// Method to close the ticket
    public function close($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->is_closed = true;
        $ticket->save();

        // Notify customer
        Mail::to($ticket->user->email)->send(new TicketClosed($ticket));

        return redirect()->route('tickets.index')->with('success', 'Ticket closed successfully.');
    }

}
