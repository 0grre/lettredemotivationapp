<?php

namespace App\Http\Controllers\Stripe;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\RedirectResponse;
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
        $credit_amount = $price_id == config('stripe.first_product') ? 25 : 100;

        return Auth::user()->checkout($price_id, [
            'success_url' => route('checkout.success').'?session_id={CHECKOUT_SESSION_ID}&credit_amount='. $credit_amount,
            'cancel_url' => route('checkout.cancel'),
        ]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function success(Request $request)
    {
        $user = Auth::user();
        $checkoutSession = $user->stripe()->checkout->sessions->retrieve($request->get('session_id'));

        if(!$user->account) {
            $account = new Account();
            $user->account()->save($account);
        }

        $amount = $request->get('credit_amount');

        $user->fundAccountBalance($amount);

        return redirect()->route('dashboard')->with('success', "Félicitations ! Ton compte vient d'être créditer de ". $amount . " crédits.");
    }

    /**
     * @return RedirectResponse
     */
    public function cancel(): RedirectResponse
    {
        return redirect()->route('dashboard')->withErrors(["checkout_failed" => "une erreur s'est produite lors du paiement"]);
    }
}
