<?php

namespace App\Http\Controllers;

use App\Models\CollectionEvent;
use App\Models\EventComment;
use Illuminate\Http\Request;

class VolunteerController extends Controller
{
    public function view(Request $request) {
        $code = $request->code;

        $collectionEvent = CollectionEvent::where('code', intval($code))->firstOrFail();

        return view('volunteer.sellingevent', ['collectionEvent' => $collectionEvent]);
    }

    public function createFollowup(Request $request) {

        $code = $request->get('code');

        $validation = $request->validate([
            'remaining_bandages' => ['required', 'numeric'],
            'money_after_event' => ['required', 'numeric'],
            'comments' => ['required', 'string'],
        ]);

        $collectionEvent = CollectionEvent::where('code', $code)->first();


        $validation['collection_event_id'] = $collectionEvent->id;

        EventComment::create($validation);

        return view('volunteer.followup', ['collectionEvent' => $collectionEvent]);
    }



}
