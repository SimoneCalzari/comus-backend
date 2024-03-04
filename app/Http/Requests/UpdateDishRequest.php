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
            'price' => ['required', 'decimal: 0,2', 'numeric', 'min:0.01'],
            'is_visible' => ['required', 'boolean'],
            'img' => ['nullable', 'max:10240', 'image'],

        ];
    }

    public function messages()
    {
        return [

            'name.required' => 'Il nome è obbligatorio.',
            'name.string' => 'Il nome deve essere una stringa di lettere.',
            'name.max' => 'Il nome non può superare :max caratteri.',
            'ingredients.max' => 'La lista degli ingredienti non può superare :max caratteri',
            'ingredients.string' => 'La lista degli ingredienti deve essere una stringa di lettere',
            'price.required' => 'Il prezzo è obbligatorio.',
            'price.numeric' => 'Il prezzo deve essere un numero, basta giocare sull\'inspector',
            'price.decimal' => 'Il prezzo deve avere da 0 a 2 cifre decimali.',
            'price.min' => 'Il prezzo deve essere positivo',
            'img.max' => 'L\' url dell\'immagine non può superare :max caratteri.',
            'img.image' => 'Il file deve essere un\'immagine con uno tra i seguenti formati jpg, jpeg, png, bmp, gif, svg, o webp',
            'img.max' => 'L\'immagine deve pesare meno di 10Mb'
        ];
    }
}
