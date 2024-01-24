<?php

namespace App\Http\Controllers;

use App\Models\Attendee;
use App\Models\Event;
use Database\Seeders\EventSeeder;
use Illuminate\Http\Request;
use Psr\Container\NotFoundExceptionInterface;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        // dd($events);
        return view('events.index', compact('events'));
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request,Event $events)
    {   
        Event::create($request->all());
        //  dd($request);
        // $request->validate([
        //     'name' => 'required',
        //     'event_id' => 'required'
        // ]);
        // Attendee::create($request->all());
        return redirect()->back();
    }


    public function show($id)
    {   
        $event = Event::with('attendees')->find($id);
        // dd($event);
        if(!$event){
            abort(404);
        }
        $events = Event::find($id);
        $attend = $events->attendees;
        $attendee = Attendee::where('event_id', $event->id)->get();
        return view('events.show',compact('event','attendee','attend'));
    }

    public function edit($id)
    {
        $event = Event::find($id);
        // dd($id);
        return view('events.edit',compact('event'));
    }

    

    public function update(Request $request, $id)
    {
        // $eventData = Event::find($id);
        $events=Event::find($id)->update($request->all());
        return redirect('/events');
    }

    public function destroy($id)
    {
        $list = Event::find($id)->delete();
        return back();
    }
    //----------------------------------------------------------------------------------------------------------------//
    public function storeAttendee(Request $request, Event $event){
        // $event = Event::all();
        // dd($request);
        Attendee::create($request->all());
        return back();
    }
    public function editAttendee($id){
        $attendee = Attendee::find($id);
        return view('attendee.edit', compact('attendee'));
    }
    
    public function updateAttendee(Request $request,$id){     
        $attendee = Attendee::find($id);

        if ($attendee) {
            $attendee->update($request->all());
        }
            $event = Event::with('attendees')->find($id);

        if (!$event) {
            abort(404);
        }
            $attendees = Attendee::where('event_id', $event->id)->get();
        return redirect('/events')->with(compact('event', 'attendees'));
        }
    public function destroyAttendee($id){
            $attendee = Attendee::find($id);
            $attendee->delete();

    return redirect()->back();
    }


}
