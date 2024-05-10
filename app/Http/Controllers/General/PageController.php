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
        seo()->title('Exemple de lettre de motivation')
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
        seo()->title('FAQ')
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
        seo()->title('Tarifs')
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
        seo()->title('Crédits')
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
        seo()->title('Contact')
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
        seo()->title('Conditions générales')
            ->description('Conditions générales d\'utilisation de LettreDeMotivation.app')
            ->twitter();

        return view('terms');
    }

    /**
     * @return View
     */
    public function privacy(): View
    {
        seo()->title('Politique de confidentialité')
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
        seo()->title('Cookies')
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
        seo()->title('Tableau de bord')
            ->description('Tableau de bord de LettreDeMotivation.app')
            ->withUrl()
            ->twitter();

        return view('dashboard', [
            "balance" => Auth::user()->account->balance
        ]);
    }
}
