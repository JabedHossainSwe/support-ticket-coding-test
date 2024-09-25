@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Your Tickets</h1>
        <a href="{{ route('tickets.create') }}" class="btn btn-primary">Open New Ticket</a>

        @if ($tickets->isEmpty())
            <p>You have not opened any tickets.</p>
        @else
            <ul class="list-group mt-3">
                @foreach ($tickets as $ticket)
                    <li class="list-group-item">
                        <strong>{{ $ticket->subject }}</strong>
                        <span class="badge badge-secondary">{{ $ticket->status }}</span>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
