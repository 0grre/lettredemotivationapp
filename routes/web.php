<?php

use App\Http\Controllers\LetterController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Models\Appellation;
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


/** Public */
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/faq', [PageController::class, 'faq'])->name('faq');
Route::get('/terms', [PageController::class, 'terms'])->name('terms');
Route::get('/privacy', [PageController::class, 'privacy'])->name('privacy');

/** Guest */
Route::middleware('guest')->group(function () {
    Route::get('/letters/create-step-one', [LetterController::class, 'createStepJob'])->name('letters.create.step.job');
    Route::post('/letters/create-step-one', [LetterController::class, 'postCreateStepJob'])->name('letters.create.step.job.post');

    Route::get('/letters/create-step-three', [LetterController::class, 'createStepCompany'])->name('letters.create.step.company');
    Route::post('letters/create-step-three', [LetterController::class, 'postCreateStepCompany'])->name('letters.create.step.company.post');

    Route::get('/letters/create-step-four', [LetterController::class, 'createStepName'])->name('letters.create.step.name');
    Route::post('/letters/create-step-four', [LetterController::class, 'postCreateStepName'])->name('letters.create.step.name.post');

    Route::get('/letters/created', [LetterController::class, 'letterCreated'])->name('letter.created');
});

/** Authenticated */
Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');

    Route::get('/letters', [LetterController::class, 'index'])->name('letters.index');
    Route::get('/letters/{letter}', [LetterController::class, 'show'])->name('letters.show');
    Route::get('/letters/download/{letter}', [LetterController::class, 'download'])->name('letters.download');
    Route::get('/create/letters', [LetterController::class, 'create'])->name('letters.create');
    Route::post('/letters', [LetterController::class, 'store'])->name('letters.create.post');
    Route::patch('/letters/{letter}', [LetterController::class, 'update']);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

Route::get('/test', function () {
    return view('letter.show', [

        'letter' => Auth::user()->letters->last()

    ]);
});

require __DIR__ . '/auth.php';
