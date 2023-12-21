<?php

namespace App\Http\Controllers;

use App\Enums\Status;
use App\Models\CollectionEvent;
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


        CollectionEvent::create($validated);

        // TODO: return to code overview
        return to_route('management.create_code');

    }




}
