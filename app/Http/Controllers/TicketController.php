<?php

namespace App\Http\Controllers;

use App\Mail\TicketClosed;
use App\Mail\TicketOpened;
use App\Mail\TicketResponded;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::where('user_id', Auth::id())->get();
        return view('home', compact('tickets'));
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

        $adminEmail = User::find(1)->email;

        Mail::to(Auth::user()->email)->send(new TicketOpened($ticket));
        Mail::to($adminEmail)->send(new TicketOpened($ticket));

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

    public function close($ticketId)
    {
        $ticket = Ticket::findOrFail($ticketId);
        $ticket->status = 'closed';
        $ticket->save();
    
        if ($ticket->user) {
            Mail::to($ticket->user->email)->send(new TicketClosed($ticket));
        } else {
            Log::warning("Ticket closed for a ticket with ID {$ticketId} but no associated user.");
        }
    
        return redirect()->back()->with('success', 'Ticket has been closed and customer has been notified.');
    }
    

    public function respond(Request $request, $ticketId)
    {
        $ticket = Ticket::findOrFail($ticketId);

        if ($ticket->status === 'open') {
            $ticket->admin_response = $request->input('response');
            $ticket->status = 'in-progress';
            $ticket->save();

            Mail::to($ticket->user->email)->send(new TicketResponded($ticket));

            return redirect()->back()->with('success', 'Response has been sent to the customer.');
        }

        return redirect()->back()->with('error', 'Cannot respond to a closed ticket.');
    }

}
