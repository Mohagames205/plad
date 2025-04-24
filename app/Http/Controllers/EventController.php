<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function listEvents(Request $request) {
        return view('management.events', ['events' => Event::orderBy('name', 'desc')->get()]);
    }
}
