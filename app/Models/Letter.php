<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Ogrre\ChatGPT\Traits\HasChat;
use OpenAI;

class Letter extends Model
{
    use HasChat;

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'title',
        'text',
        'company',
        'contract_type',
        'skills',
        'experience',
        'localization',
        'user_id',
        'appellation_id',
        'archived_at'
    ];

    /**
     * @var mixed|OpenAI\Client
     */
    private mixed $client;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->client = OpenAI::client(config('openai.api_key'));
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

        $request->session()->forget('letter');
    }

    /**
     * @param User $user
     * @param int $words
     * @return string
     */
    public function newLetterPrompt(User $user, int $words): string
    {
        $string_skills = '';

        foreach (json_decode($this->skills) as $skill) {
            $string_skills .= " " . $skill . ";";
        }

        return "Rédige moi une lettre de motivation professionnelle et pertinente de " . $words . " mots maximum en te basant sur les informations suivantes:
              - Prénom, Nom: " . $user->name .
            " - Poste: " . $this->appellation->libelle .
            " - Type de contrat: " . $this->contract_type .
            " - Compétences: " . $string_skills .
            " - Entreprise: " . $this->company .
            " - Localisation: " . $this->localization .
            " - Expérience: " . $this->experience . " ans
            En ce qui concerne l'entête tu ne mettras que mon nom et prénom indenté comme une lettre de motivation,
            tu indiquera dans l'objet de la lettre le type de contrat et le poste visé,
            tu laisseras un espace supplémentaire et en dessous tu ajouteras la date d'aujourd'hui qui est "
            . Carbon::now()->addDay()->locale('fr')->isoFormat('dddd D MMMM YYYY');
        }

    /**
     * @param string $prompt
     * @return $this
     */
    public function regenerate(string $prompt): static
    {
        $old_chat = $this->chats->last();
        $chat = $old_chat->gpt($prompt);

        $this->text = $chat['messages']->last()->content;
        $this->save();

        return $this;
    }

    /**
     * @return BelongsTo
     */
    public function appellation(): BelongsTo
    {
        return $this->belongsTo(Appellation::class);
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
