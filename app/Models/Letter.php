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
        'title',
        'text',
        'company',
        'skills',
        'experience',
        'localization',
        'user_id',
        'appellation_id',
    ];

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
        $message = $request->session()->get('message');
        $conversation->messages()->save($message);

        $request->session()->forget('letter');
        $request->session()->forget('message');
    }

    /**
     * @param User $user
     * @return Letter
     */
    public function generate(User $user): Letter
    {
        $client = OpenAI::client(env('OPENAI_API_KEY'));

        $string_skills = '';
        $libelle = Appellation::find($this->appellation_id)->libelle;

        foreach (json_decode($this->skills) as $skill) {
            $string_skills .= " " . $skill . ";";
        }

        $content = "Rédige moi une lettre de motivation professionnelle et pertinente de 300 mots maximum en te basant sur les informations suivantes:
              - Prénom, Nom: " . $user->name .
            " - Poste: " . $libelle .
            " - Compétences: " . $string_skills .
            " - Entreprise: " . $this->company .
            " - Localisation: " . $this->localization .
            " - Expérience: " . $this->experience . " ans";

        $response = $client->chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'user', 'content' => $content],
            ],
        ]);

        $this->title = "Candidature pour le poste de " . $libelle . " chez " . $this->company;
        $this->text = $response->choices[0]->message->content;

        return $this;
    }

    /**
     * @return HasOne
     */
    public function appellation(): HasOne
    {
        return $this->hasOne(Appellation::class);
    }

    /**
     * Get the phone associated with the user.
     */
    public function conversation(): BelongsTo
    {
        return $this->belongsTo(Conversation::class);
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
