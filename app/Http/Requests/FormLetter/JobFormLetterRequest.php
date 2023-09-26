<?php

namespace App\Http\Requests\FormLetter;

use App\Rules\AppellationRule;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class JobFormLetterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'appellation' => ['required', 'string', 'max:250', new AppellationRule()],
            'contract_type' => 'required|string|max:25',
            'experience' => 'required|integer|max:4',
        ];
    }
}
