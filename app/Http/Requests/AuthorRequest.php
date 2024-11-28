<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
                'name' => 'required|string|max:255',
            'birthday' => [
                'nullable',
                'date',
                'before_or_equal:today' ,  // Non può essere nel futuro
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Il nome dell\'autore è obbligatorio.',
            'name.string' => 'Il nome dell\'autore deve essere una stringa.',
            'name.max' => 'Il nome dell\'autore non può superare i 255 caratteri.',

            'birthday.before_or_equal' => 'La data di nascita non può essere nel futuro.',
        ];
    }
}
