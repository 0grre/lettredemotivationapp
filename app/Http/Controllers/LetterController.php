<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormLetter\NameFormLetterRequest;
use App\Http\Requests\FormLetter\JobFormLetterRequest;
use App\Http\Requests\FormLetter\CompanyFormLetterRequest;
use App\Http\Requests\Letter\StoreLetterRequest;
use App\Models\Appellation;
use App\Models\Letter;
use App\Models\User;
use Barryvdh\DomPDF\Facade\PDF;
use GuzzleHttp\Client;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LetterController extends Controller
{
    /**
     * @return View
     */
    public function createStepJob(): View
    {
        return view('first-letter.base-form', [
            'appellations' => Appellation::all(),
            'step' => 'job'
        ]);
    }

    /**
     * @param JobFormLetterRequest $request
     * @return RedirectResponse
     */
    public function postCreateStepJob(JobFormLetterRequest $request): RedirectResponse
    {
        $request->validated();

        $appellation = Appellation::where('libelle', $request->appellation)->first();

        $client = new Client();
        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded',
        ];
        $options = [
            'form_params' => [
                'grant_type' => 'client_credentials',
                'client_id' => env('POLE_EMPLOI_CLIENT_ID'),
                'client_secret' => env('POLE_EMPLOI_CLIENT_SECRET'),
                'scope' => env('POLE_EMPLOI_SCOPE'),
            ]];
        $guzzle_request = new \GuzzleHttp\Psr7\Request('POST', 'https://entreprise.pole-emploi.fr/connexion/oauth2/access_token?realm=/partenaire', $headers);
        $res = $client->sendAsync($guzzle_request, $options)->wait();
        $token = json_decode($res->getBody())->access_token;

        $headers = [
            'Authorization' => 'Bearer ' . $token
        ];
        $guzzle_request = new \GuzzleHttp\Psr7\Request('GET', 'https://api.pole-emploi.io/partenaire/rome-metiers/v1/metiers/appellation/' . $appellation->code, $headers);
        $res = $client->sendAsync($guzzle_request)->wait();
        $appellation_request = json_decode($res->getBody());

        if (empty($request->session()->get('letter'))) {
            $letter = new Letter();
        } else {
            $letter = $request->session()->get('letter');
        }

        $letter->fill([
            "experience" => $request->experience,
            "contract_type" => $request->contract_type,
            "skills" => Appellation::getSkills($appellation_request->competencesCles),
            "appellation_id" => $appellation->id
        ]);
        $request->session()->put('letter', $letter);

        return redirect()->route('letters.create.step.company');
    }

    /**
     * @return View
     */
    public function createStepCompany(): View
    {
        return view('first-letter.base-form', [
            'step' => 'company'
        ]);
    }

    /**
     * @param CompanyFormLetterRequest $request
     * @return RedirectResponse
     */
    public function postCreateStepCompany(CompanyFormLetterRequest $request): RedirectResponse
    {
        $request->validated();

        $letter = $request->session()->get('letter');
        $letter->fill($request->all());
        $letter->fill([
            "title" => $letter->company . "_" .$letter->appellation->libelle
        ]);
        $request->session()->put('letter', $letter);

        return redirect()->route('letters.create.step.name');
    }

    /**
     * @return View
     */
    public function createStepName(): View
    {
        return view('first-letter.base-form', [
            'step' => 'name'
        ]);
    }

    /**
     * @param NameFormLetterRequest $request
     * @return RedirectResponse
     */
    public function postCreateStepName(NameFormLetterRequest $request): RedirectResponse
    {
        $request->validated();

        $letter = $request->session()->get('letter');
        if (empty($request->session()->get('user'))) {
            $user = new User();
        } else {
            $user = $request->session()->get('user');
        }
        $user->fill(['name' => $request->firstname . " " . $request->lastname]);
        $user->letters()->save($letter);

        $request->session()->forget('letter');
        $request->session()->put('user', $user);

        $prompt = $letter->newLetterPrompt($user, 300);

        $new_chat = $letter->newChat();
        $chat = $new_chat->gpt($prompt);

        $letter->text = $chat['messages']->last()->content;

        $request->session()->put('letter', $letter);

        return redirect()->route('letter.created');
    }

    /**
     * @param Request $request
     * @return View
     */
    public function letterCreated(Request $request): View
    {
        $user = $request->session()->get('user');
        $letter = $request->session()->get('letter');

        return view('letter.created', [
            'name' => $user->name,
            'text' => substr($letter->text, 0, -955),
        ]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('letter.store', [
            'appellations' => Appellation::all(),
            'step' => 'one'
        ]);
    }

    /**
     * @return View
     */
    public function index(): View
    {
        return view('letter.index', [
            'letters' => Auth::user()->letters()->where('archived_at', null)->get(),
        ]);
    }

    /**
     * @return View
     */
    public function archives(): View
    {
        return view('letter.archives', [
            'letters' => Auth::user()->letters()->where('archived_at', !null)->get(),
        ]);
    }

    /**
     * @param StoreLetterRequest $request
     * @return View
     */
    public function store(StoreLetterRequest $request): View
    {
        $request->validated();

        // start pôle emploi

        $appellation = Appellation::where('libelle', $request->appellation)->first();

        $client = new Client();
        $headers = [
            'Content-Type' => 'application/x-www-form-urlencoded',
        ];
        $options = [
            'form_params' => [
                'grant_type' => 'client_credentials',
                'client_id' => env('POLE_EMPLOI_CLIENT_ID'),
                'client_secret' => env('POLE_EMPLOI_CLIENT_SECRET'),
                'scope' => env('POLE_EMPLOI_SCOPE'),
            ]];
        $guzzle_request = new \GuzzleHttp\Psr7\Request('POST', 'https://entreprise.pole-emploi.fr/connexion/oauth2/access_token?realm=/partenaire', $headers);
        $res = $client->sendAsync($guzzle_request, $options)->wait();
        $token = json_decode($res->getBody())->access_token;

        $headers = [
            'Authorization' => 'Bearer ' . $token
        ];
        $guzzle_request = new \GuzzleHttp\Psr7\Request('GET', 'https://api.pole-emploi.io/partenaire/rome-metiers/v1/metiers/appellation/' . $appellation->code, $headers);
        $res = $client->sendAsync($guzzle_request)->wait();
        $appellation_request = json_decode($res->getBody());

        // end pôle emploi

        $letter = new Letter();
        $letter->fill($request->all());

        $user = Auth::user();

        $letter->fill([
            "skills" => Appellation::getSkills($appellation_request->competencesCles),
            "appellation_id" => $appellation->id,
            "title" => $letter->company . "_" .$appellation->libelle
        ]);

        $user->letters()->save($letter);

        $prompt = $letter->newLetterPrompt($user, 300);

        $new_chat = $letter->newChat();
        $chat = $new_chat->gpt($prompt);

        $letter->text = $chat['messages']->last()->content;
        $letter->save();

        return view('letter.show', [
            'letter' => $letter,
            'old_letters' => []
        ]);
    }

    /**
     * @param Letter $letter
     * @return View
     */
    public function show(Letter $letter): View
    {
        $old_letters = $letter->chats->last()->messages()->where('role', 'assistant')->get();

        return view('letter.show', [
            'letter' => $letter,
            'old_letters' => sizeof($old_letters) > 1 ? $old_letters : []
        ]);
    }

    /**
     * @param Letter $letter
     * @return Response
     */
    public function download(Letter $letter)
    {
        $title = $letter->title ? $letter->title : $letter->company . "_" . $letter->appellation->libelle;

        return Pdf::loadView('letter.pdf', ['letter' => $letter])->download($title . '.pdf');
    }


    /**
     * @param Letter $letter
     * @return RedirectResponse
     */
    public function regenerate(Letter $letter)
    {
        $prompt = "En te basant sur les mêmes informations, reformule et améliore la précédente lettre en étant moins générique";

        $letter->regenerate($prompt);

        return redirect()->back();
    }


    /**
     * @param Letter $letter
     * @return RedirectResponse
     */
    public function increase(Letter $letter)
    {
        $prompt = "En te basant sur les mêmes informations, reformule et améliore la précédente lettre en ajoutant un paragraphe";

        $letter->regenerate($prompt);

        return redirect()->back();
    }

    /**
     * @param Letter $letter
     * @return RedirectResponse
     */
    public function reduce(Letter $letter)
    {
        $prompt = "En te basant sur les mêmes informations, reformule et améliore la précédente lettre en retirant un paragraphe";

        $letter->regenerate($prompt);

        return redirect()->back();
    }

    /**
     * @param Letter $letter
     * @return RedirectResponse
     */
    public function archive(Letter $letter)
    {
        $letter->archived_at = Carbon::now();

        return redirect()->route('dashboard');
    }

    /**
     * @param Letter $letter
     * @return RedirectResponse
     */
    public function delete(Letter $letter)
    {
        $letter->delete();

        return redirect()->route('dashboard');
    }
}

