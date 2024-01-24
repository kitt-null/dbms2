<?php

namespace App\Http\Controllers;

use App\Models\Attendee;
use App\Models\Event;
use Illuminate\Http\Request;

class AttendeeController extends Controller
{
    public function index($id)
    {
        $events = Event::find($id);
        $event = Event::all();
        foreach($event as $events){
            $eventId = $events->id;
        }

        // dd($eventId);
        return view('attendee.create',compact('events','eventId'));
    }

    public function create()
    {   
        
        // return redirect('/events/show');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'event_id' => 'required|string'
        ]);
        Attendee::create($request->all());
        return redirect()->back();
    }

    public function show(Attendee $member)
    {
        //
    }

    public function edit($id)
    {
        $attendee = Attendee::find($id);
        return view('attendee.edit',compact('attendee'));
    }

    public function update(Request $request, Attendee $member)
    {
        //
    }

    public function destroy($id)
    {
        $list = Attendee::find($id)->delete();
        return back();
    }
}
