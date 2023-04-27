<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\View\View;

class LetterController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(): View
    {
        return view('letter.edit', [
            'user' => "",
        ]);
    }

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
