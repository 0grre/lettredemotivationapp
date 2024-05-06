<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\ContactRequest;
use App\Jobs\SendContactMailJob;
use Illuminate\Http\RedirectResponse;

class ContactController extends Controller
{
    /**
     * @param ContactRequest $request
     * @return RedirectResponse
     */
    public function send(ContactRequest $request)
    {
        $validatedData = $request->validated();
        $email = config('mail.from.receiver');

        try {
            SendContactMailJob::dispatch($email, $validatedData);
            return redirect()->back()->with('success', 'Votre message a été envoyé avec succès, nous vous répondons au plus vite.');
        } catch (\Exception $e) {
            $message = $e->getCode() == 550
                ? "votre adresse email n'est pas valide (boîte aux lettres introuvable)."
                : "une erreur s'est produite, veuillez réssayer plus tard.";
            return back()->withErrors(['error_mail' => $e->getMessage()]);
        }
    }
}
