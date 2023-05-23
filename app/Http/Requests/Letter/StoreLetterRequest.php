<?php

namespace App\Http\Requests\Letter;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreLetterRequest extends FormRequest
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
            'appellation' => 'string|max:250',
            'experience' => 'integer|max:4',
            'company' => 'string|max:50',
            'localization' => 'string|max:50',
        ];
    }
}
