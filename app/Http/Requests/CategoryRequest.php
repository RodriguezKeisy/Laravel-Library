<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
    public function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:categories,name'
        ];
    }

    /**
     * I messaggi di errore per la validazione.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Il nome della categoria è obbligatorio.',
            'name.string' => 'Il nome della categoria deve essere una stringa.',
            'name.max' => 'Il nome della categoria non può superare i 255 caratteri.',
            'name.unique' => 'Una categoria con questo nome esiste già.'
        ];
    }
}
