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


Route::get('/', function () {
    return view('home.welcome');
})->name('home');

Route::get('search', function() {
    $query = ''; // <-- Change the query for testing.

    return Appellation::search($query)->get();
});


Route::get('/faq', [PageController::class, 'faq'])->name('faq');
Route::get('/terms', [PageController::class, 'terms'])->name('terms');
Route::get('/privacy', [PageController::class, 'privacy'])->name('privacy');

Route::get('/letters/create-step-one', [LetterController::class, 'createStepOne'])->name('letters.create.step.one');
Route::post('/letters/create-step-one', [LetterController::class, 'postCreateStepOne'])->name('letters.create.step.one.post');

Route::get('/letters/create-step-two', [LetterController::class, 'createStepTwo'])->name('letters.create.step.two');
Route::post('/letters/create-step-two', [LetterController::class, 'postCreateStepTwo'])->name('letters.create.step.two.post');

Route::get('/letters/create-step-three', [LetterController::class, 'createStepThree'])->name('letters.create.step.three');
Route::post('letters/create-step-three', [LetterController::class, 'postCreateStepThree'])->name('letters.create.step.three.post');

Route::get('/letters/create-step-four', [LetterController::class, 'createStepFour'])->name('letters.create.step.four');
Route::post('/letters/create-step-four', [LetterController::class, 'postCreateStepFour'])->name('letters.create.step.four.post');

Route::get('/letters/created', [LetterController::class, 'letterIsCreated'])->name('letter.is.created');

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

Route::get('/test', function (){
    return view('letter.show', [

        'letter' => Auth::user()->letters->last()

    ]);
});

require __DIR__ . '/auth.php';
