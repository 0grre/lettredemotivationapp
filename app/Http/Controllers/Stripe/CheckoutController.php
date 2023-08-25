<?php

namespace App\Http\Controllers\Stripe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CheckoutController extends Controller
{
    /**
     * @param $price_id
     * @return mixed
     */
    public function product($price_id)
    {
        return Auth::user()->checkout('price_1NfmN6IJlOw6AxbUNgtmQuhs', [
            'success_url' => route('checkout.success').'?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('checkout.cancel'),
        ]);
    }

    /**
     * @param Request $request
     * @return View
     */
    public function success(Request $request): View
    {
        $checkoutSession = Auth::user()->stripe()->checkout->sessions->retrieve($request->get('session_id'));

        return view('dashboard', ['checkoutSession' => $checkoutSession]);
    }

    /**
     * @param Request $request
     * @return View
     */
    public function cancel(Request $request): View
    {
//        $checkoutSession = Auth::user()->stripe()->checkout->sessions->retrieve($request->get('session_id'));
        return view('welcome');
    }
}
