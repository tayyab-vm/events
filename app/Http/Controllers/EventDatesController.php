<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\EventDate;
use App\Http\Resources\EventResource;
use App\Http\Requests\StoreEventDatesRequest;

class EventDatesController extends Controller
{
   
    public function store(StoreEventDatesRequest $request)
    {
        $eventDate = EventDate::create($request->all());
        return new EventResource(Event::with('dates')->find($eventDate->event_id));
    }

    public function update(StoreEventDatesRequest $request, EventDate $eventDate)
    {
        $eventDate->update($request->all());
        return new EventResource(Event::with('dates')->find($eventDate->event_id));
    }

    public function destroy(EventDate $eventDate)
    {
        $eventDate->delete();
        return EventResource::collection(Event::with('dates')->get());
    }
}
