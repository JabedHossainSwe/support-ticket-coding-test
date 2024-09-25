@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create a Ticket</h1>

        <form action="{{ route('tickets.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" name="subject" id="subject" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
@endsection
