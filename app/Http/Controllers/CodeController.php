<?php

namespace App\Http\Controllers;

use App\Enums\Status;
use App\Models\CollectionEvent;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CodeController extends Controller
{
    public function create(Request $request) {

        $request->merge([
            'volunteers' => json_encode(explode(',', $request->get('volunteers'))),
            'code' => mt_rand(100000, 999999)
        ]);

        $validated = $request->validate([
            'code' => ['required', 'numeric', 'unique:collection_events'],
            'location' => ['required', 'string'],
            'start_time' => ['required', 'date_format:Y-m-d\TH:i'],
            'end_time' =>  ['required', 'date_format:Y-m-d\TH:i'],
            'volunteers' => ['required', 'json'],
            'bandage_count' => ['required', 'numeric'],
            'change_received' => ['required', 'numeric'],
            'payconiq_uid' => ['required', 'numeric'],
            'status' => ['required', Rule::enum(Status::class)],
        ]);

        $created = CollectionEvent::create($validated);

        // TODO: return to code overview
        return to_route('code.view', $created->id);

    }

    public function listCodes(Request $request) {


        return view('management.code', ['events' => CollectionEvent::orderBy('start_time', 'desc')->get()]);
    }

    public function viewCode(Request $request) {
        return view('management.individual_code', ['event' => CollectionEvent::find($request->id)]);
    }

    public function deleteCode(Request $request) {
        $id = $request->id;
        $event = CollectionEvent::find($request->id);
        $event->comment?->delete();
        $event->delete();

        return to_route('code.list');

    }

    public function editCode(Request $request) {
        $id = $request->id;
        $event = CollectionEvent::find($request->id);

        $event->fill($request->toArray());
        $event->save();

        return back();
    }

    public function deleteComment(Request $request) {
        $id = $request->id;
        $event = CollectionEvent::find($request->id);

        $event->comment->delete();

        return back();
    }

    public function loadPdf(Request $request) {
        $id = $request->id;

        $event = CollectionEvent::find($request->id);

        $info = [
            "code" => $event->code,
            "bandage_count" => $event->bandage_count,
            "location" => $event->location,
            "volunteers" => $event->volunteers,
            "start_time" => $event->start_time,
            "end_time" => $event->end_time,
            "change_received" => $event->change_received,
            "status" => $event->status,
        ];

        if ($event->comment) {
            $info["comments"] = $event->comment->comments;
            $info["money_after_event"] = $event->comment->money_after_event;
            $info["remaining_bandages"] = $event->comment->remaining_bandages;
        }


        $pdf = PDF::loadView('pdf.summary', $info);
        return $pdf->stream('text.pdf');
    }




}
