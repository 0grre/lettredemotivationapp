<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class PageController extends Controller
{
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
}
