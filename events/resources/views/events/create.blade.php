<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Add Event</title>
</head>
<body>
    <h1>Event Details</h1>
    <form action="{{route('events.store')}}" method="POST">
        @csrf
        <div>
            <input type="text" name="eventName" placeholder="Event Name" required>
            <input type="date" name="date" placeholder="Date" required>
            <input type="text" name="location" placeholder="Location" required>
            <button type="submit">Save</button>
            <a href="{{route('events.index')}}">Back</a>
        </div>
    </form>
</body>
</html>