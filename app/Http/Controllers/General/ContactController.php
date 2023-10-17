<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\ContactRequest;
use App\Mail\Contact;
use Illuminate\Http\RedirectResponse;
use Mail;

class ContactController extends Controller
{
    /**
     * @param ContactRequest $request
     * @return RedirectResponse
     */
    public function send(ContactRequest $request)
    {
        $request->validated();

        try {
            Mail::to(config('mail.from.receiver'))->send(new Contact($request));
        } catch (\Exception $e) {
            $message = $e->getCode() == 550
                ? "votre adresse email n'est pas valide (boîte aux lettres introuvable)."
                : "une erreur s'est produite, veuillez réssayer plus tard.";
            return back()->withErrors(['error_mail' => $message]);
        }

        return redirect()->back()->with('success', 'Votre message à été envoyé avec succès, nous vous répondons au plus vite ');
    }
}
