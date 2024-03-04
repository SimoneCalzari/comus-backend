<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDishRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:50'],
            'ingredients' => ['nullable', 'string', 'max:255'],
            'price' => ['required', 'decimal: 0,2'],
            'is_visible' => ['required'],
            'img' => ['nullable', 'max:10240', 'image'],

        ];
    }

    public function messages()
    {
        return [

            'name.required' => 'Il nome è obbligatorio.',
            'name.string' => 'Il nome è deve essere una stringa di lettere.',
            'name.max' => 'Il nome non può superare :max caratteri.',
            'ingredients.max' => 'La lista di ingredienti non può superare :max caratteri.',
            'price.required' =>
            'Il prezzo è obbligatorio.',
            'is_visible.required' => 'La disponibilità è obbligatoria',
            'img.max' => 'L\'immagine deve pesare meno di 10Mb'
        ];
    }
}
