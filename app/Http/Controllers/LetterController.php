<?php

namespace App\Http\Controllers;

use App\Http\Requests\Job\UpdateProfilRequest;
use App\Models\Conversation;
use App\Models\Job;
use App\Models\Letter;
use App\Models\Message;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LetterController extends Controller
{
    /**
     * @return View
     */
    public function createStepOne(): View
    {
        return view('first-letter.base-form', [
            'user' => "",
            'step' => 'one'
        ]);
    }

    /**
     * @param UpdateProfilRequest $request
     * @return RedirectResponse
     */
    public function postCreateStepOne(UpdateProfilRequest $request): RedirectResponse
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
            'user' => "",
            'step' => 'two'
        ]);
    }

    /**
     * @param UpdateProfilRequest $request
     * @return RedirectResponse
     */
    public function postCreateStepTwo(UpdateProfilRequest $request): RedirectResponse
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
            'user' => "",
            'step' => 'three'
        ]);
    }

    /**
     * @param UpdateProfilRequest $request
     * @return RedirectResponse
     */
    public function postCreateStepThree(UpdateProfilRequest $request): RedirectResponse
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
            'user' => "",
            'step' => 'four'
        ]);
    }

    /**
     * @param UpdateProfilRequest $request
     * @return RedirectResponse
     */
    public function postCreateStepFour(UpdateProfilRequest $request): RedirectResponse
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


//        $result = Http::timeout(60)->withHeaders([
//            'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
//            'Content-Type' => 'application/json',
//        ])->post("https://api.openai.com/v1/chat/completions", [
//            'model' => 'gpt-3.5-turbo',
//            'messages' => [
//                ['role' => 'user', 'content' => $content],
//            ],
//            "temperature" => 1
//        ]);

        $letter = new Letter();
        $letter->fill([
            "title" => "Candidature pour le poste de " . $profil->company . " chez " . $profil->company . " à " . $profil->localization,
            "text" => "Objet : Candidature pour le poste de développeur web chez Wokine à Lille\n\nMadame, Monsieur,\n\nJe suis actuellement à la recherche d'un poste de développeur web dans le secteur de l'informatique et je suis très intéressé par l'opportunité de travailler chez Wokine à Lille.\n\nJe suis un développeur web expérimenté avec plus de trois ans d'expérience dans le domaine. Je suis passionné par la technologie et je suis toujours à l'affût des tendances et des nouvelles méthodes pour améliorer mes compétences. En tant que force de proposition, je suis convaincu que mes compétences et mes connaissances techniques me permettront de contribuer de manière significative au développement de votre entreprise.\n\nJe suis également réputé pour mon écoute, ma capacité à travailler en équipe et ma volonté de toujours apprendre de nouvelles choses. Je suis convaincu que ces qualités me permettront de m'intégrer rapidement dans votre entreprise et de devenir un membre précieux de votre équipe.\n\nEnfin, je suis courageux et je n'ai pas peur de relever des défis. Je suis convaincu que la création d'un site web innovant et performant nécessite de la créativité, de la persévérance et de la détermination. Je suis donc prêt à travailler dur et à relever tous les défis pour vous aider à atteindre vos objectifs.\n\nJe suis convaincu que mon profil correspond à ce que vous recherchez et je suis impatient de discuter avec vous de la possibilité de rejoindre votre entreprise. Si vous souhaitez en savoir plus sur mes compétences et mes réalisations, n'hésitez pas à me contacter pour convenir d'un entretien.\n\nJe vous remercie par avance pour votre considération et je suis impatient de vous rencontrer bientôt.\n\nCordialement,\n\n[Prénom Nom]",
//            "text" => json_decode($result->body())->choices[0]->message->content,
        ]);
        $request->session()->put('letter', $letter);

        $message = new Message();
        $message->fill([
            "role" => "user",
            "content" => $content,
            "oder" => 1
        ]);
        $request->session()->put('message', $message);

//        $request->session()->forget('profil');

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
//            'text' => $letter->text,
            "text" => substr("Objet : Candidature pour le poste de développeur web chez Wokine à Lille\n\nMadame, Monsieur,\n\nJe suis actuellement à la recherche d'un poste de développeur web dans le secteur de l'informatique et je suis très intéressé par l'opportunité de travailler chez Wokine à Lille.\n\nJe suis un développeur web expérimenté avec plus de trois ans d'expérience dans le domaine. Je suis passionné par la technologie et je suis toujours à l'affût des tendances et des nouvelles méthodes pour améliorer mes compétences. En tant que force de proposition, je suis convaincu que mes compétences et mes connaissances techniques me permettront de contribuer de manière significative au développement de votre entreprise.\n\nJe suis également réputé pour mon écoute, ma capacité à travailler en équipe et ma volonté de toujours apprendre de nouvelles choses. Je suis convaincu que ces qualités me permettront de m'intégrer rapidement dans votre entreprise et de devenir un membre précieux de votre équipe.\n\nEnfin, je suis courageux et je n'ai pas peur de relever des défis. Je suis convaincu que la création d'un site web innovant et performant nécessite de la créativité, de la persévérance et de la détermination. Je suis donc prêt à travailler dur et à relever tous les défis pour vous aider à atteindre vos objectifs.\n\nJe suis convaincu que mon profil correspond à ce que vous recherchez et je suis impatient de discuter avec vous de la possibilité de rejoindre votre entreprise. Si vous souhaitez en savoir plus sur mes compétences et mes réalisations, n'hésitez pas à me contacter pour convenir d'un entretien.\n\nJe vous remercie par avance pour votre considération et je suis impatient de vous rencontrer bientôt.\n\nCordialement,\n\n[Prénom Nom]", 0, -955),
        ]);
    }

    /**
     * @param Request $request
     * @param User $user
     * @return void
     */
    public static function saveSessionLetter(Request $request, User $user){

        $letter = $request->session()->get('letter');
        $user->letters()->save($letter);
        $conversation = Conversation::create([
            "user_id" => $user->id,
            "letter_id" => $letter->id
        ]);
        $message = $request->session()->get('message');
        $conversation->messages()->save($message);
    }
}

