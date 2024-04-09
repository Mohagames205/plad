<?php

namespace App\Http\Controllers;

use App\Enums\Status;
use App\Models\CollectionEvent;
use App\Models\MoneyValidation;
use App\Models\ProductValidation;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ValidationController extends Controller
{
    public function viewMoney(Request $request)
    {
        return view('management.validation.validate_money', ['event' => CollectionEvent::find($request->id)]);
    }

    public function validateMoney(Request $request)
    {
        $validated = $request->validate([
            'cash_money' => ['required', 'numeric'],
            'payconiq_money' => ['required', 'numeric'],
            'sumup_money' => ['required', 'numeric'],
        ]);

        $validated['collection_event_id'] = $request->id;

        MoneyValidation::create($validated);

        return to_route('code.view', $request->id);
    }

    public function viewMoneyValidation(Request $request)
    {

        return view('management.validation.money_validation_view', ['validation' => CollectionEvent::find($request->id)->moneyValidation]);
    }

    public function deleteMoneyValidation(Request $request)
    {
        $id = $request->id;
        $event = CollectionEvent::find($request->id);

        $event->moneyValidation->delete();

        return to_route('code.view', $request->id);
    }

    public function viewBandages(Request $request)
    {
        return view('management.validation.validate_bandages', ['event' => CollectionEvent::find($request->id)]);
    }

    public function validateBandages(Request $request)
    {
        $validated = $request->validate([
            'remaining_bandages' => ['required', 'numeric'],
        ]);

        $validated['collection_event_id'] = $request->id;

        ProductValidation::create($validated);

        return to_route('code.view', $request->id);
    }

    public function viewBandageValidation(Request $request)
    {
        return view('management.validation.bandage_validation_view', ['validation' => CollectionEvent::find($request->id)->productValidation]);
    }

    public function deleteBandageValidation(Request $request)
    {
        $id = $request->id;
        $event = CollectionEvent::find($request->id);

        $event->productValidation->delete();

        return to_route('code.view', $request->id);
    }


}
