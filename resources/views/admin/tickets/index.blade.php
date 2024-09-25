@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>All Tickets</h1>

        <table class="table">
            <thead>
                <tr>
                    <th>Subject</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tickets as $ticket)
                    <tr>
                        <td>{{ $ticket->subject }}</td>
                        <td>{{ $ticket->status }}</td>
                        <td>
                            <a href="{{ route('admin.tickets.show', $ticket) }}" class="btn btn-info">View</a>
                            @if ($ticket->status === 'open')
                                <form action="{{ route('admin.tickets.close', $ticket) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Close Ticket</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
