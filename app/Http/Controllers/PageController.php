<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\User;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PageController extends Controller
{

    /**
     * @return View
     */
    public function home(): View
    {
        return view('welcome');
    }

    /**
     * @return View
     */
    public function faq(): View
    {
        return view('faq');
    }
    /**
     * @return View
     */
    public function pricing(): View
    {
        return view('pricing');
    }
    /**
     * @return View
     */
    public function contact(): View
    {
        return view('contact');
    }

    /**
     * @return View
     */
    public function terms(): View
    {
        return view('terms');
    }

    /**
     * @return View
     */
    public function privacy(): View
    {
        return view('privacy');
    }

    /**
     * @return View
     */
    public function dashboard(): View
    {
        return view('dashboard', [
            "letters" => Auth::user()->letters
        ]);
    }

    /**
     * @param Request $request
     * @param User $user
     * @return void
     */
    private static function saveSessionLetter(Request $request, User $user){

        $letter = $request->session()->get('letter');
        $user->letters()->save($letter);
        $conversation = Conversation::create([
            "user_id" => $user->id,
            "letter_id" => $letter->id
        ]);
        $message = $request->session()->get('message');
        $conversation->messages()->save($message);
    }
}
