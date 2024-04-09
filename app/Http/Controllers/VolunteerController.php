<?php

namespace App\Http\Controllers;

use App\Enums\Status;
use App\Models\CollectionEvent;
use App\Models\EventComment;
use Illuminate\Http\Request;
use function Laravel\Prompts\error;

class VolunteerController extends Controller
{
    public function view(Request $request) {
        $code = $request->code;

        $collectionEvent = CollectionEvent::where('code', intval($code))->firstOrFail();

        if($collectionEvent->status == Status::ACTIVE->value) {
            return view('volunteer.sellingevent', ['collectionEvent' => $collectionEvent]);
        }

        return response("Deze code is niet actief", 403);
    }

    public function createFollowup(Request $request) {
        \DB::enableQueryLog();

        $code = $request->get('code');

        $validation = $request->validate([
            'remaining_bandages' => ['required', 'numeric'],
            'money_after_event' => ['required', 'numeric'],
            'comments' => ['nullable','string'],
        ]);

        $collectionEvent = CollectionEvent::where('code', $code)->firstOrFail();
        $collectionEvent->status = strval(Status::CLOSED->value);
        $collectionEvent->save();

        $validation['collection_event_id'] = $collectionEvent->id;

        EventComment::create($validation);

        return view('volunteer.followup', ['collectionEvent' => $collectionEvent]);
    }



}
