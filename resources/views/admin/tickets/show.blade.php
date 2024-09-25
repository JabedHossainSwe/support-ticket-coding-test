@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Ticket Details</h1>
        <h3>{{ $ticket->subject }}</h3>
        <p>{{ $ticket->description }}</p>
        <p>Status: <strong>{{ $ticket->status }}</strong></p>
    </div>
@endsection
