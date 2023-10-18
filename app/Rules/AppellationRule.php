<?php

namespace App\Rules;

use App\Models\Appellation;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class AppellationRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param Closure(string): PotentiallyTranslatedString $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!Appellation::where('libelle', $value)->first()) {
            $fail("L'appellation métier n'existe pas dans notre base de donnée.");
        }
    }
}
