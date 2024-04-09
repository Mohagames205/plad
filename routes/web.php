<?php

use App\Http\Controllers\CodeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ValidationController;
use App\Http\Controllers\VolunteerController;
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
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/create_code', function () {
        return view('management.create_code');
    })->name('management.create_code');

    Route::get('/code', [CodeController::class, 'listCodes'])->name('code.list');

    Route::get('/code/{id}', [CodeController::class, 'viewCode'])->name('code.view');

    Route::delete('/code/{id}', [CodeController::class, 'deleteCode'])->name('code.delete');

    Route::patch('/code/{id}', [CodeController::class, 'editCode'])->name('code.edit');

    Route::get('/code/{id}/pdf', [CodeController::class, 'loadPdf']);

    Route::post('/create_code', [CodeController::class, 'create']);

    Route::delete('/code/{id}/comment', [CodeController::class, 'deleteComment'])->name('comment.delete');

    Route::get('/code/{id}/validate/money/create', [ValidationController::class, 'viewMoney'])->name('validation.money');
    Route::post('/code/{id}/validate/money', [ValidationController::class, 'validateMoney'])->name('validation.money.create');
    Route::get('/code/{id}/validate/money', [ValidationController::class, 'viewMoneyValidation'])->name('validation.money.see');
    Route::delete('/code/{id}/validate/money', [ValidationController::class, 'deleteMoneyValidation'])->name('validation.money.delete');

    Route::get('/code/{id}/validate/bandages/create', [ValidationController::class, 'viewBandages'])->name('validation.bandages');
    Route::post('/code/{id}/validate/bandages', [ValidationController::class, 'validateBandages'])->name('validation.bandage.create');
    Route::get('/code/{id}/validate/bandages', [ValidationController::class, 'viewBandageValidation'])->name('validation.bandage.see');
    Route::delete('/code/{id}/validate/bandages', [ValidationController::class, 'deleteBandageValidation'])->name('validation.bandage.delete');

});



require __DIR__.'/auth.php';
