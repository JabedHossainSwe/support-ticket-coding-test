<?php

namespace App\Http\Controllers;

use App\Mail\TicketOpened;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::where('user_id', Auth::id())->get();
        return view('home', compact('tickets')); // Modify to your customer dashboard
    }

    public function create()
    {
        return view('tickets.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $ticket = Ticket::create([
            'user_id' => Auth::id(),
            'subject' => $request->subject,
            'description' => $request->description,
        ]);

        Mail::to(Auth::user()->email)->send(new TicketOpened($ticket));

        return redirect()->route('tickets.index')->with('success', 'Ticket opened successfully!');
    }

    public function adminIndex()
    {
        $tickets = Ticket::all();
        return view('admin.tickets.index', compact('tickets'));
    }

    public function show(Ticket $ticket)
    {
        return view('admin.tickets.show', compact('ticket'));
    }

    public function close(Ticket $ticket)
    {
        $ticket->update(['status' => 'closed']);

        // Send email notification to customer
        Mail::to($ticket->user->email)->send(new \App\Mail\TicketClosed($ticket));

        return redirect()->route('admin.tickets.index')->with('success', 'Ticket closed successfully!');
    }

}
