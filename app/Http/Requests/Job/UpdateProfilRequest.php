<?php

namespace App\Http\Requests\Job;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProfilRequest extends FormRequest
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
            'job' => 'nullable|string|max:55',
            'duration' => 'nullable|integer|max:4',
            'skills' => 'nullable|string',
            'sector' => 'nullable|string',
            'company' => 'nullable|string|max:55',
            'localization' => 'nullable|string|max:55',
        ];
    }
}
