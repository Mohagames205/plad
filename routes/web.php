<?php

use App\Http\Controllers\CodeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ValidationController;
use App\Http\Controllers\VolunteerController;
use App\Models\CollectionEvent;
use App\Models\EventComment;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('volunteer.identify');
});

Route::get('/selling_event', [VolunteerController::class, 'view'])->name("selling_event");

Route::post('/followup', [VolunteerController::class, 'createFollowup'])->name('create_followup');



Route::get('/dashboard', function () {
    // Haal alle collection events op
    $collectionEvents = CollectionEvent::where('year', intval(date('Y')))->get();

    // Voor elke collection event, haal de corresponderende event comments op
    $data = $collectionEvents->flatMap(function ($event) {
        $comments = EventComment::where('collection_event_id', $event->id)->get();
        return $comments->map(function ($comment) use ($event) {
            // Bereken het aantal verkochte bandages
            $soldBandages = $event->bandage_count - $comment->remaining_bandages;
            return [
                'date' => $comment->created_at->toDateString(), // Gebruik de datum van de comment
                'sold_bandages' => $soldBandages,
            ];
        });
    })->groupBy('date')->map(function ($items, $date) {
        return [
            'date' => $date,
            'total_sold_bandages' => $items->sum('sold_bandages'),
        ];
    });

    // Sorteer de data op datum
    $dataArray = $data->sortBy('date')->values()->toArray();

    // Bereken totaal aantal verkochte bandages
    $totalSoldBandages = 0;
    foreach ($dataArray as $dataItem) {
        $totalSoldBandages += $dataItem['total_sold_bandages'];
    }

    $sums = EventComment::join('collection_events', 'event_comments.collection_event_id', '=', 'collection_events.id')
        ->where('collection_events.year', date('Y'))
        ->selectRaw('SUM(event_comments.remaining_bandages) AS total_remaining_bandages, SUM(collection_events.bandage_count) AS total_bandages')
        ->first();

    $sold = $sums->total_bandages - $sums->total_remaining_bandages;


    // Geef de data en totale verkochte bandages door aan de view
    return view('dashboard', [
        'dataArray' => $dataArray,
        'sold' => $sold,
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/code/create', function () {
        return view('management.create_code');
    })->name('management.create_code');

    Route::get('/code', [CodeController::class, 'listCodes'])->name('code.list');
    Route::post('/code', [CodeController::class, 'create'])->name('code.create');

    Route::get('/code/export', [CodeController::class, 'exportCsv'])->name('code.export');

    Route::get('/code/{id}', [CodeController::class, 'viewCode'])->name('code.view');

    Route::delete('/code/{id}', [CodeController::class, 'deleteCode'])->name('code.delete');

    Route::patch('/code/{id}', [CodeController::class, 'editCode'])->name('code.edit');

    Route::get('/code/{id}/edit', [CodeController::class, 'editAction'])->name('code.edit');

    Route::get('/code/{id}/pdf', [CodeController::class, 'loadPdf']);

    Route::get('/code/{id}/contract', [CodeController::class, 'loadPdfContract']);

    Route::delete('/code/{id}/comment', [CodeController::class, 'deleteComment'])->name('comment.delete');

    Route::get('/code/{id}/validate/money/create', [ValidationController::class, 'viewMoney'])->name('validation.money');
    Route::post('/code/{id}/validate/money', [ValidationController::class, 'validateMoney'])->name('validation.money.create');
    Route::get('/code/{id}/validate/money', [ValidationController::class, 'viewMoneyValidation'])->name('validation.money.see');
    Route::delete('/code/{id}/validate/money', [ValidationController::class, 'deleteMoneyValidation'])->name('validation.money.delete');
;
    Route::get('/code/{id}/validate/bandages/create', [ValidationController::class, 'viewBandages'])->name('validation.bandages');
    Route::post('/code/{id}/validate/bandages', [ValidationController::class, 'validateBandages'])->name('validation.bandage.create');
    Route::get('/code/{id}/validate/bandages', [ValidationController::class, 'viewBandageValidation'])->name('validation.bandage.see');
    Route::delete('/code/{id}/validate/bandages', [ValidationController::class, 'deleteBandageValidation'])->name('validation.bandage.delete');

});



require __DIR__.'/auth.php';
