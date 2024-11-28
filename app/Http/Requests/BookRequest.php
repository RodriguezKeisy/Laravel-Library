<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:800',
            'pages' => 'nullable|integer',
            'author_id' => 'required|exists:authors,id',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // (JPEG, PNG, JPG)
        ];
    }
    public function messages(): array
    {
        return [

            'title.required' => 'Il titolo è obbligatorio.',
            'title.string' => 'Il titolo deve essere una stringa.',
            'title.max' => 'Il titolo non può superare i 255 caratteri.',


            'description.string' => 'La descrizione deve essere una stringa.',
            'description.max' => 'La descrizione non può superare gli 800 caratteri.',


            'pages.integer' => 'Il numero di pagine deve essere un valore numerico intero.',


            'author_id.required' => 'L\'autore è obbligatorio.',
            'author_id.exists' => 'L\'autore selezionato non è valido.',


            'category_id.required' => 'La categoria è obbligatoria.',
            'category_id.exists' => 'La categoria selezionata non è valida.',


            'image.image' => 'Il file deve essere un\'immagine.',
            'image.mimes' => 'L\'immagine deve essere in formato JPEG, PNG o JPG.',
            'image.max' => 'L\'immagine non può superare i 2 MB.',
        ];
    }

}
