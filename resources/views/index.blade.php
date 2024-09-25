@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Welcome</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Link to your CSS -->
    </head>

    <body>
        <div class="container">
            <h1>Welcome to the Support Ticket System</h1>
            <p>Please log in to access your dashboard or submit a ticket.</p>
            <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
            <a href="{{ route('register') }}" class="btn btn-secondary">Register</a>
        </div>
    </body>

    </html>
@endsection
