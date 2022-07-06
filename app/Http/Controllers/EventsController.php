<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Resources\EventResource;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEventRequest;

class EventsController extends Controller
{
   
    public function index()
    {   
        $events = Event::with('dates')->get();
        return EventResource::collection($events);
    }

    public function store(StoreEventRequest $request)
    {
        $event = Event::create($request->all());
        return new EventResource($event->load('dates'));
    }
   
    public function show(Event $event)
    {
        return new EventResource($event->load('dates'));
    }
   
    public function update(StoreEventRequest $request, Event $event)
    {
        $event->update($request->all());
        return new EventResource($event->load('dates'));
    }
   
    public function destroy(Event $event)
    {
        $event->delete();
        return EventResource::collection(Event::with('dates')->get());

    }
}
