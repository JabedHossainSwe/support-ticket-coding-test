@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <title>@yield('title', 'Admin Dashboard')</title>
    </head>

    <body>

        <div class="container mt-4">
            <h1>Welcome to the Admin Dashboard</h1>

            <!-- Bootstrap Buttons -->
            <div class="mb-4">
                <a href="{{ route('admin.tickets.index') }}" class="btn btn-primary">View Tickets</a>
                <a href="{{ route('users.index') }}" class="btn btn-secondary">Manage Users</a>
               
            </div>

            @yield('dashboard-content')
        </div>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.11/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>

    </html>
@endsection
