<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
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
    public function credits(): View
    {
        return view('credits');
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
            "balance" => Auth::user()->account->balance
        ]);
    }
}
