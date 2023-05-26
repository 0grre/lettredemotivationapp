<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Http\Request;
use OpenAI;

class Letter extends Model
{
    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'prompt',
        'text',
        'company',
        'skills',
        'experience',
        'localization',
        'words',
        'user_id',
        'appellation_id',
    ];

    /**
     * @param User $user
     * @return Letter
     */
    public function generate(User $user): Letter
    {
        $client = OpenAI::client(env('OPENAI_API_KEY'));

        $string_skills = '';
        $words = 300;
        $libelle = Appellation::find($this->appellation_id)->libelle;

        foreach (json_decode($this->skills) as $skill) {
            $string_skills .= " " . $skill . ";";
        }

        $prompt = "Rédige moi une lettre de motivation professionnelle et pertinente de " . $words . " mots maximum en te basant sur les informations suivantes:
              - Prénom, Nom: " . $user->name .
            " - Poste: " . $libelle .
            " - Compétences: " . $string_skills .
            " - Entreprise: " . $this->company .
            " - Localisation: " . $this->localization .
            " - Expérience: " . $this->experience . " ans";

        $response = $client->chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'user', 'content' => $prompt],
            ],
        ]);

        $this->words = $words;
        $this->prompt = $prompt;
        $this->text = $response->choices[0]->message->content;

        return $this;
    }

    /**
     * @param Request $request
     * @return void
     */
    public function createNewConversation(Request $request): void
    {
        $prompt_message = new Message();
        $prompt_message->fill([
            "role" => "user",
            "content" => $this->prompt,
            "order" => 1
        ]);
        $request->session()->put('prompt_message', $prompt_message);

        $response_message = new Message();
        $response_message->fill([
            "role" => "assistant",
            "content" => $this->text,
            "order" => 2
        ]);
        $request->session()->put('response_message', $response_message);
    }

    /**
     * @param Request $request
     * @param User $user
     * @return void
     */
    public static function saveLetter(Request $request, User $user): void
    {
        $letter = $request->session()->get('letter');
        $user->letters()->save($letter);

        $conversation = Conversation::create([
            "user_id" => $user->id,
            "letter_id" => $letter->id
        ]);
        $message = $request->session()->get('prompt_message');
        $conversation->messages()->save($message);

        $message = $request->session()->get('response_message');
        $conversation->messages()->save($message);

        $request->session()->forget('letter');
        $request->session()->forget('prompt_message');
        $request->session()->forget('response_message');
    }

    /**
     * @return BelongsTo
     */
    public function appellation(): BelongsTo
    {
        return $this->belongsTo(Appellation::class);
    }

    /**
     * Get the phone associated with the user.
     */
    public function conversation(): HasOne
    {
        return $this->hasOne(Conversation::class);
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
