<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\User;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return RedirectResponse|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function redirect(): RedirectResponse|\Symfony\Component\HttpFoundation\RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return RedirectResponse
     */
    public function callback(): RedirectResponse
    {
        try {
            $user = Socialite::driver('google')->stateless()->user();
            $findUser = User::where('google_id', $user->id)->first();
            if($findUser){
                Auth::login($findUser);
            }else{
                $newUser = User::updateOrCreate(['email' => $user->email],[
                    'name' => $user->name,
                    'google_id'=> $user->id,
                    'password' => encrypt(config('services.google.password'))
                ]);

                $account = new Account();
                $newUser->account()->save($account);

                Auth::login($newUser);
            }
            return redirect()->intended('dashboard');

        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
}
