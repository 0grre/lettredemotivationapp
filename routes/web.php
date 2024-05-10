<?php

use App\Http\Controllers\General\ContactController;
use App\Http\Controllers\General\LetterController;
use App\Http\Controllers\General\PageController;
use App\Http\Controllers\General\ProfileController;
use App\Http\Controllers\Stripe\CheckoutController;
use Illuminate\Support\Facades\Route;
use Spatie\Sitemap\SitemapGenerator;

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
Route::get('/pricing', [PageController::class, 'pricing'])->name('pricing');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/terms', [PageController::class, 'terms'])->name('terms');
Route::get('/privacy', [PageController::class, 'privacy'])->name('privacy');
Route::get('/cookie', [PageController::class, 'cookie'])->name('cookie');

Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

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
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/** Authenticated and Verified */
Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/credits', [PageController::class, 'credits'])->name('credits');

    Route::get('/checkout-product/{id}', [CheckoutController::class, 'product'])->name('checkout.product');;
    Route::get('/checkout-success', [CheckoutController::class, 'success'])->name('checkout.success');
    Route::get('/checkout-cancel', [CheckoutController::class, 'cancel'])->name('checkout.cancel');

    Route::get('/letters', [LetterController::class, 'index'])->name('letters.index');
    Route::get('/archives', [LetterController::class, 'archives'])->name('letters.archives');
    Route::get('/letters/{letter}', [LetterController::class, 'show'])->name('letters.show');
    Route::get('/letters/download/{letter}', [LetterController::class, 'download'])->name('letters.download');
    Route::get('/letters/regenerate/{letter}', [LetterController::class, 'regenerate'])->name('letters.regenerate');
    Route::get('/letters/increase/{letter}', [LetterController::class, 'increase'])->name('letters.increase');
    Route::get('/letters/reduce/{letter}', [LetterController::class, 'reduce'])->name('letters.reduce');
    Route::get('/letters/restore/{letter}', [LetterController::class, 'restore'])->name('letters.restore');

    Route::get('/create/letters', [LetterController::class, 'create'])->name('letters.create');
    Route::post('/letters', [LetterController::class, 'store'])->name('letters.create.post');
    Route::patch('/letters/{letter}', [LetterController::class, 'update']);
    Route::delete('/letters/archive/{letter}', [LetterController::class, 'archive'])->name('letters.archive');
    Route::delete('/letters/delete/{letter}', [LetterController::class, 'delete'])->name('letters.delete');
});

Route::get('/test', function () {

});

require __DIR__ . '/auth.php';
