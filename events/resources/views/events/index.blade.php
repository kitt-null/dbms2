<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Home Page</title>
</head>
<body>
    <div class="text-center mt-10">
    <h1 class="text-3xl">Events Registration System</h1>
    <br><br>
    <h4 class="text-3xl">Event Lists</h4>
    <table class="table-auto m-auto border-solid border-2 border-gray-200 mt-10">
        <thead class="border-solid border-2 border-gray-200">
            <tr>
                <th class="border-solid border-2 border-gray-200 w-96 text-center p-2">Event Name <br> (click to view attendees)</th>
                <th class="border-solid border-2 border-gray-200 w-96 text-center p-2">Date</th>
                <th class="border-solid border-2 border-gray-200 w-96 text-center p-2">Location</th>
                <th class="border-solid border-2 border-gray-200 w-96 text-center p-2">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($events as $q)
                <tr>
                    <td class="border-solid border-2 border-gray-200 pt-5 pb-5 text-left p-2 col">
                        <a href="{{route('events.show',[$q->id])}}">{{$q->eventName}}</a>
                    </td>
                    <td class="border-solid border-2 border-gray-200 pt-5 pb-5 text-left p-2 col">{{$q->date}}</td>
                    <td class="border-solid border-2 border-gray-200 pt-5 pb-5 text-left p-2 col">{{$q->location}}</td>
                    <td class="border-solid border-2 border-gray-200 pt-5 pb-5 text-left p-2 col">
                        <a href="{{route('events.edit',[$q->id])}}" class="bg-blue-400 p-1 text-white rounded hover:bg-blue-600 text-sm font-bolder">Edit Event Info</a>
                        <form action="{{route('events.destroy',[$q->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <br>
                            <button class="bg-red-400 p-1 text-white rounded hover:bg-red-600 text-sm font-bolder" type="submit">Delete Event</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">NO DATA</td>
                </tr>
            @endforelse    
        </tbody>
    </table>

    <form action="{{route('events.store')}}" method="POST" class="pt-10">
        @csrf
        <h5 class="text-3xl">Add New Event</h5>
        <div class="d-flex justify-content-around">
            <input type="text" name="eventName" placeholder="Event Name" required class="p-3 border-solid border-2 border-gray-200 rounded " autocomplete="off">
            <input type="date" name="date" placeholder="Event Date" value="Event Date" required class="p-3 border-solid border-2 border-gray-200 rounded " autocomplete="off">
            <input type="text" name="location" placeholder="Event Location" required class="p-3 border-solid border-2 border-gray-200 rounded " autocomplete="off">
            <button type="submit" class="p-2  mt-3 bg-cyan-600 text-white rounded hover:bg-cyan-800 font-bold">Add</button>
        </div>
    </form>
    </div>
</body>
</html>