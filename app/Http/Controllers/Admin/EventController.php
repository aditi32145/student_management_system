<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->get();
        return view('admin.events.index', compact('events'));
    }


    public function create()
    {
        return view('admin.events.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'event_date' => 'required',
            'time' => 'required',
            'location' => 'required'
        ]);


        Event::create($request->all());


        return redirect()->route('admin.events.index')
            ->with('success', 'Event added successfully');
    }
}

