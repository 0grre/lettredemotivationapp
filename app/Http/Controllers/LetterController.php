<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class LetterController extends Controller
{
    /**
     * @return View
     */
    public function createStepOne(): View
    {
        return view('first-letter.base-form',[
            'user' => "",
            'step' => 'one'
        ]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function postCreateStepOne(Request $request): RedirectResponse
    {
//        if(empty($request->session()->get('letter'))){
//            $letter = new Letter();
//            $letter->fill($validatedData);
        $profil[] = ["job" => $request->job, "experience" => $request->experience];
            $request->session()->put('profil', $profil);
//        }else{
//            $letter = $request->session()->get('letter');
//            $letter->fill($validatedData);
//            $request->session()->put('letter', $letter);
//        }

        return redirect()->route('letters.create.step.two');
    }

    /**
     * @param Request $request
     * @return View
     */
    public function createStepTwo(Request $request): View
    {
        $profil = $request->session()->get('profil');

        return view('first-letter.base-form',[
            'user' => "",
            'step' => 'two'
        ]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function postCreateStepTwo(Request $request): RedirectResponse
    {
        $profil = $request->session()->get('profil');

        $profil[] = ["sector" => $request->sector, "skills" => $request->skills];

        $request->session()->put('profil', $profil);

        return redirect()->route('letters.create.step.three');
    }

    /**
     * @param Request $request
     * @return View
     */
    public function createStepThree(Request $request): View
    {
        $profil = $request->session()->get('profil');

        return view('first-letter.base-form',[
        'user' => "",
        'step' => 'three'
    ]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function postCreateStepThree(Request $request): RedirectResponse
    {

        $profil = $request->session()->get('profil');
        $profil[] = ["company" => $request->company, "localization" => $request->localization];

        $request->session()->put('profil', $profil);

        return redirect()->route('letters.create.step.four');
    }

    /**
     * @param Request $request
     * @return View
     */
    public function createStepFour(Request $request): View
    {
        $profil = $request->session()->get('profil');

        return view('first-letter.base-form',[
            'user' => "",
            'step' => 'four'
        ]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function postCreateStepFour(Request $request): RedirectResponse
    {
        $profil = $request->session()->get('profil');
//        $letter->save();

//        $request->session()->forget('letter');

        dd($profil);

        return redirect()->route('letters.generate');
    }



    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|Factory|\Illuminate\Contracts\View\View|Application
     */
    public function store(Request $request)
    {
        $result = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
            'Content-Type' => 'application/json',
        ])->post("https://api.openai.com/v1/chat/completions", [
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'user', 'content' => $request->prompt],
            ],
        ]);

        return view('letter.edit', [
            'text' => json_decode($result->body())->choices[0]->message->content,
        ]);
//        return Redirect::route('dashboard')->with('status', 'profile-updated');
    }
}
