<?php

use App\Http\Controllers\LetterController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
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
});

Route::get('/faq', [PageController::class, 'faq'])->name('faq');

Route::get('letters/create-step-one', [LetterController::class, 'createStepOne'])->name('letters.create.step.one');
Route::post('letters/create-step-one', [LetterController::class, 'postCreateStepOne'])->name('letters.create.step.one.post');

Route::get('letters/create-step-two', [LetterController::class, 'createStepTwo'])->name('letters.create.step.two');
Route::post('letters/create-step-two', [LetterController::class, 'postCreateStepTwo'])->name('letters.create.step.two.post');

Route::get('letters/create-step-three', [LetterController::class, 'createStepThree'])->name('letters.create.step.three');
Route::post('letters/create-step-three', [LetterController::class, 'postCreateStepThree'])->name('letters.create.step.three.post');

Route::get('letters/create-step-four', [LetterController::class, 'createStepFour'])->name('letters.create.step.four');
Route::post('letters/create-step-four', [LetterController::class, 'postCreateStepFour'])->name('letters.create.step.four.post');

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__ . '/auth.php';
