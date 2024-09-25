<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Response to Your Support Ticket</title>
</head>

<body>
    <h1>Response to Your Ticket: {{ $ticket->subject }}</h1>
    <p>Dear {{ $ticket->user->name }},</p>

    <p>The admin has responded to your ticket. Here are the details:</p>

    <p><strong>Response:</strong> {{ $ticket->admin_response }}</p>

    <p>You can view your ticket and respond if necessary by clicking the link below:</p>
    <p><a href="{{ url('/tickets/' . $ticket->id) }}">View Ticket</a></p>

    <p>Thank you for your patience!</p>
    <p>Best Regards,<br>Your Support Team</p>
</body>

</html>
