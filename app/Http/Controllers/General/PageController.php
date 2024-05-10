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
        seo()->title('Exemple de lettre de motivation - LettreDeMotivation.app')
            ->description('Générateur de lettre de motivation en ligne')
            ->withUrl()
            ->twitter();

        return view('welcome');
    }

    /**
     * @return View
     */
    public function faq(): View
    {
        seo()->title('FAQ - LettreDeMotivation.app')
            ->description('Foire aux questions sur la lettre de motivation')
            ->withUrl()
            ->twitter();

        return view('faq');
    }

    /**
     * @return View
     */
    public function pricing(): View
    {
        seo()->title('Tarifs - LettreDeMotivation.app')
            ->description('Tarifs de la génération de lettre de motivation')
            ->withUrl()
            ->twitter();

        return view('pricing');
    }

    /**
     * @return View
     */
    public function credits(): View
    {
        seo()->title('Crédits - LettreDeMotivation.app')
            ->description('Acheter des crédits pour générer des lettres de motivation')
            ->withUrl()
            ->twitter();

        return view('credits');
    }

    /**
     * @return View
     */
    public function contact(): View
    {
        seo()->title('Contact - LettreDeMotivation.app')
            ->description('Contacter le support de LettreDeMotivation.app')
            ->withUrl()
            ->twitter();

        return view('contact');
    }

    /**
     * @return View
     */
    public function terms(): View
    {
        seo()->title('Conditions générales - LettreDeMotivation.app')
            ->description('Conditions générales d\'utilisation de LettreDeMotivation.app')
            ->twitter();

        return view('terms');
    }

    /**
     * @return View
     */
    public function privacy(): View
    {
        seo()->title('Politique de confidentialité - LettreDeMotivation.app')
            ->description('Politique de confidentialité de LettreDeMotivation.app')
            ->withUrl()
            ->twitter();

        return view('privacy');
    }

    /**
     * @return View
     */
    public function cookie(): View
    {
        seo()->title('Cookies - LettreDeMotivation.app')
            ->description('Politique de cookies de LettreDeMotivation.app')
            ->withUrl()
            ->twitter();

        return view('cookie');
    }

    /**
     * @return View
     */
    public function dashboard(): View
    {
        seo()->title('Tableau de bord - LettreDeMotivation.app')
            ->description('Tableau de bord de LettreDeMotivation.app')
            ->withUrl()
            ->twitter();

        return view('dashboard', [
            "balance" => Auth::user()->account->balance
        ]);
    }
}
