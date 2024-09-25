<!DOCTYPE html>
<html>

<head>
    <title>New Support Ticket</title>
</head>

<body>
    <h1>New Support Ticket Opened</h1>
    <p>A new support ticket has been opened.</p>
    <p><strong>Issue:</strong> {{ $ticket->issue }}</p>
    <p><strong>Submitted by:</strong> {{ $ticket->user->name }}</p>
    <p>You can view the ticket in the admin panel.</p>
</body>

</html>
