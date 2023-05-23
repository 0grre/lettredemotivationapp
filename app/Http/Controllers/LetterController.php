<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormLetter\FourFormLetterRequest;
use App\Http\Requests\FormLetter\OneFormLetterRequest;
use App\Http\Requests\FormLetter\ThreeFormLetterRequest;
use App\Http\Requests\FormLetter\TwoFormLetterRequest;
use App\Http\Requests\Letter\StoreLetterRequest;
use App\Models\Appellation;
use App\Models\Conversation;
use App\Models\Letter;
use App\Models\Message;
use App\Models\User;
use Dompdf\Dompdf;
use GuzzleHttp\Client;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use OpenAI;

class LetterController extends Controller
{
    public OpenAI\Client $client;

    public function __construct()
    {
        $this->client = OpenAI::client(env('OPENAI_API_KEY'));;
    }

    /**
     * @return View
     */
    public function createStepOne(): View
    {
        return view('first-letter.base-form', [
            'appellations' => Appellation::all(),
            'step' => 'one'
        ]);
    }

    /**
     * @param OneFormLetterRequest $request
     * @return RedirectResponse
     */
    public function postCreateStepOne(OneFormLetterRequest $request): RedirectResponse
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
            "skills" => Appellation::getSkills($appellation_request->competencesCles),
            "appellation_id" => $appellation->id
        ]);
        $request->session()->put('letter', $letter);

        return redirect()->route('letters.create.step.three');
    }

    /**
     * @return View
     */
    public function createStepTwo(): View
    {
        return view('first-letter.base-form', [
            'step' => 'two'
        ]);
    }

    /**
     * @param TwoFormLetterRequest $request
     * @return RedirectResponse
     */
    public function postCreateStepTwo(TwoFormLetterRequest $request): RedirectResponse
    {
        $request->validated();

        $profil = $request->session()->get('profil');
        $profil->fill($request->all());
        $request->session()->put('profil', $profil);

        return redirect()->route('letters.create.step.three');
    }

    /**
     * @return View
     */
    public function createStepThree(): View
    {
        return view('first-letter.base-form', [
            'step' => 'three'
        ]);
    }

    /**
     * @param ThreeFormLetterRequest $request
     * @return RedirectResponse
     */
    public function postCreateStepThree(ThreeFormLetterRequest $request): RedirectResponse
    {
        $request->validated();

        $letter = $request->session()->get('letter');
        $letter->fill($request->all());
        $request->session()->put('letter', $letter);

        return redirect()->route('letters.create.step.four');
    }

    /**
     * @return View
     */
    public function createStepFour(): View
    {
        return view('first-letter.base-form', [
            'step' => 'four'
        ]);
    }

    /**
     * @param FourFormLetterRequest $request
     * @return RedirectResponse
     */
    public function postCreateStepFour(FourFormLetterRequest $request): RedirectResponse
    {
        $request->validated();

        $letter = $request->session()->get('letter');
        if (empty($request->session()->get('user'))) {
            $user = new User();
        } else {
            $user = $request->session()->get('user');
        }
        $user->fill(['name' => $request->firstname . " " . $request->lastname]);
        $request->session()->put('user', $user);

        $message = new Message();
        $message->fill([
            "role" => "user",
            "content" => $letter->text,
            "order" => 1
        ]);
        $request->session()->put('message', $message);
        $request->session()->put('letter', $letter->generate($user));

        return redirect()->route('letter.is.created');
    }

    /**
     * @param Request $request
     * @return View
     */
    public function letterIsCreated(Request $request): View
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
     * @param StoreLetterRequest $request
     * @return View
     */
    public function store(StoreLetterRequest $request): View
    {
        $request->validated();

        $letter = new Letter();
        $letter->fill($request->all());

        $user = Auth::user();

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

        $letter->fill([
            "skills" => Appellation::getSkills($appellation_request->competencesCles),
            "appellation_id" => $appellation->id
        ]);

        $new_letter = $letter->generate($user);
        $request->session()->put('letter', $new_letter);

        $message = new Message();
        $message->fill([
            "role" => "user",
            "content" => $new_letter->text,
            "order" => 1
        ]);
        $request->session()->put('message', $message);

        Letter::saveLetter($request, $user);

        return view('letter.show', [
            'letter' => $user->letters->last()
        ]);
    }

    /**
     * @param Letter $letter
     * @return View
     */
    public function show(Letter $letter): View
    {
        return view('letter.show', [
            'letter' => $letter
        ]);
    }

    /**
     * @param Letter $letter
     * @return void
     */
    public function download(Letter $letter): void
    {
        $dompdf = new Dompdf();
        $dompdf->loadHtml($letter->text);
        $dompdf->render();
        $dompdf->stream();
    }
}

