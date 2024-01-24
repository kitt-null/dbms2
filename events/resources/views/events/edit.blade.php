<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Edit Info</title>
</head>
<body>
    <div class="text-center mt-10">
    <h1 class="text-3xl">Edit Event Information</h1>
    <br><br>
    <form action="{{route('events.update',[$event->id])}}" method="POST">
        @csrf
        @method('PUT')
        <div class="d-flex justify-content-around">
            <input type="text" name="eventName" value="{{$event->eventName}}" placeholder="eventName" required class="p-3 border-solid border-2 border-gray-200 rounded " autocomplete="off">
            <input type="date" name="date" value="{{$event->date}}" placeholder="date" required class="p-3 border-solid border-2 border-gray-200 rounded " autocomplete="off">
            <input type="text" name="location" value="{{$event->location}}" placeholder="location" required class="p-3 border-solid border-2 border-gray-200 rounded " autocomplete="off">
            <button type="submit" class="p-2  mt-3 bg-cyan-600 text-white rounded hover:bg-cyan-800 font-bold">Save</button>
            <a href="{{route('events.index')}}" class="p-2  mt-3 bg-cyan-600 text-white rounded hover:bg-cyan-800 font-bold">Cancel</a>
        </div> 
    </form>
    </div>
</body>
</html>