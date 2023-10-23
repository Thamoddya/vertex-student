<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function addEvent(Request $request)
    {
        Event::create(
            [
                'event_name'=>$request->name,
                'venue'=>$request->venue,
                'started_date'=>$request->date,
            ]
        );
        return redirect()->back()->with('event_message','Event Added Successfully');
    }
}
