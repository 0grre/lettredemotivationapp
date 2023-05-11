<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormLetter\FourFormLetterRequest;
use App\Http\Requests\FormLetter\OneFormLetterRequest;
use App\Http\Requests\FormLetter\ThreeFormLetterRequest;
use App\Http\Requests\FormLetter\TwoFormLetterRequest;
use App\Models\Job;
use App\Models\Letter;
use App\Models\Message;
use App\Models\Sector;
use App\Models\User;
use Dompdf\Dompdf;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
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

        if (empty($request->session()->get('profil'))) {
            $profil = new Job();
        } else {
            $profil = $request->session()->get('profil');
        }
        $profil->fill($request->all());
        $request->session()->put('profil', $profil);

        return redirect()->route('letters.create.step.two');
    }

    /**
     * @return View
     */
    public function createStepTwo(): View
    {
        return view('first-letter.base-form', [
            'sectors' => Sector::all(),
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

        $profil = $request->session()->get('profil');
        $profil->fill($request->all());
        $request->session()->put('profil', $profil);

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

        $profil = $request->session()->get('profil');
        if (empty($request->session()->get('user'))) {
            $user = new User();
        } else {
            $user = $request->session()->get('user');
        }
        $user->fill(['name' => $request->firstname . " " . $request->lastname]);
        $request->session()->put('user', $user);

        $content = "Génère moi une lettre de motivation de 300 mots maximum à partir des informations suivantes:
             - Prénom, Nom: " . $user->name .
            "- Poste: " . $profil->job .
            "- Secteur d’activité: " . $profil->sector .
            "- Compétences: " . $profil->skills .
            "- Entreprise: " . $profil->company .
            "- Localisation: " . $profil->localization .
            "- Expérience: " . $profil->duration . " ans";

        $response = $this->client->chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'user', 'content' => $content],
            ],
        ]);

        $letter = new Letter();
        $letter->fill([
            "title" => "Candidature pour le poste de " . $profil->company . " chez " . $profil->company,
//            "text" => "Objet : Candidature pour le poste de développeur web chez Wokine à Lille\n\nMadame, Monsieur,\n\nJe suis actuellement à la recherche d'un poste de développeur web dans le secteur de l'informatique et je suis très intéressé par l'opportunité de travailler chez Wokine à Lille.\n\nJe suis un développeur web expérimenté avec plus de trois ans d'expérience dans le domaine. Je suis passionné par la technologie et je suis toujours à l'affût des tendances et des nouvelles méthodes pour améliorer mes compétences. En tant que force de proposition, je suis convaincu que mes compétences et mes connaissances techniques me permettront de contribuer de manière significative au développement de votre entreprise.\n\nJe suis également réputé pour mon écoute, ma capacité à travailler en équipe et ma volonté de toujours apprendre de nouvelles choses. Je suis convaincu que ces qualités me permettront de m'intégrer rapidement dans votre entreprise et de devenir un membre précieux de votre équipe.\n\nEnfin, je suis courageux et je n'ai pas peur de relever des défis. Je suis convaincu que la création d'un site web innovant et performant nécessite de la créativité, de la persévérance et de la détermination. Je suis donc prêt à travailler dur et à relever tous les défis pour vous aider à atteindre vos objectifs.\n\nJe suis convaincu que mon profil correspond à ce que vous recherchez et je suis impatient de discuter avec vous de la possibilité de rejoindre votre entreprise. Si vous souhaitez en savoir plus sur mes compétences et mes réalisations, n'hésitez pas à me contacter pour convenir d'un entretien.\n\nJe vous remercie par avance pour votre considération et je suis impatient de vous rencontrer bientôt.\n\nCordialement,\n\n[Prénom Nom]",
            "text" => $response->choices[0]->message->content,
        ]);
        $request->session()->put('letter', $letter);

        $message = new Message();
        $message->fill([
            "role" => "user",
            "content" => $content,
            "order" => 1
        ]);
        $request->session()->put('message', $message);
        $request->session()->forget('profil');

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

        return view('letter-is-created', [
            'name' => $user->name,
            'text' => substr($letter->text, 0, -955),
//            "text" => substr("Objet : Candidature pour le poste de développeur web chez Wokine à Lille\n\nMadame, Monsieur,\n\nJe suis actuellement à la recherche d'un poste de développeur web dans le secteur de l'informatique et je suis très intéressé par l'opportunité de travailler chez Wokine à Lille.\n\nJe suis un développeur web expérimenté avec plus de trois ans d'expérience dans le domaine. Je suis passionné par la technologie et je suis toujours à l'affût des tendances et des nouvelles méthodes pour améliorer mes compétences. En tant que force de proposition, je suis convaincu que mes compétences et mes connaissances techniques me permettront de contribuer de manière significative au développement de votre entreprise.\n\nJe suis également réputé pour mon écoute, ma capacité à travailler en équipe et ma volonté de toujours apprendre de nouvelles choses. Je suis convaincu que ces qualités me permettront de m'intégrer rapidement dans votre entreprise et de devenir un membre précieux de votre équipe.\n\nEnfin, je suis courageux et je n'ai pas peur de relever des défis. Je suis convaincu que la création d'un site web innovant et performant nécessite de la créativité, de la persévérance et de la détermination. Je suis donc prêt à travailler dur et à relever tous les défis pour vous aider à atteindre vos objectifs.\n\nJe suis convaincu que mon profil correspond à ce que vous recherchez et je suis impatient de discuter avec vous de la possibilité de rejoindre votre entreprise. Si vous souhaitez en savoir plus sur mes compétences et mes réalisations, n'hésitez pas à me contacter pour convenir d'un entretien.\n\nJe vous remercie par avance pour votre considération et je suis impatient de vous rencontrer bientôt.\n\nCordialement,\n\n[Prénom Nom]", 0, -955),
        ]);
    }

    /**
     * @param Letter $letter
     * @return View
     */
    public function show(Letter $letter): View
    {
        return view('letter', [
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

