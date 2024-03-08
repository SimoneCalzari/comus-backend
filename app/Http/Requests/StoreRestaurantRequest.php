<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
use Illuminate\Validation\Rules;


class StoreRestaurantRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'name_restaurant' => ['required', 'string', 'max:50'],
            'address' => ['required', 'string', 'max:100', 'unique:restaurants,address'],
            'phone_number' => ['required', 'size:10'],
            'VAT' => ['required', 'size:11'],
            'img' => ['required', 'max:10240', 'image'],
            'types' => ['required', 'exists:types,id'],

        ];
    }
    public function messages()
    {
        return [

            'name.required' => 'Il nome è obbligatorio.',
            'name.max' => 'Il nome non può superare :max caratteri.',
            'password.confirmed' => 'La password non è uguale',
            'password.required' => 'La password è obbligatoria',
            'name_restaurant.required' => 'Il nome è obbligatorio.',
            'name_restaurant.max' => 'Il nome non può superare :max caratteri.',
            'address.required' => 'L\' indirizzo è obbligatorio.',
            'address.max' => 'L\' indirizzo non può superare :max caratteri.',
            'address.unique' => 'E\' già presente un altro ristorante con lo stesso indizizzo',
            'phone_number.required' => 'Il numero di telefono è obbligatorio.',
            'phone_number.size' => 'Il numero di telefono deve avere :size numeri',
            'phone_number.numeric' => 'Il numero di telefono è composto solo da numeri',
            'VAT.required' => 'La Partita IVA è obbligatoria.',
            'VAT.size' => 'La Partita IVA deve essere :size numeri.',
            'VAT.numeric' => 'La Partita IVA è formata solo da numeri',
            'img.required' => 'L\'immagine è obbligatoria.',
            'img.max' => 'L\' url dell\'immagine non può superare :max caratteri.',
            'img.image' => 'Il file deve essere un\'immagine con uno tra i seguenti formati jpg, jpeg, png, bmp, gif, svg, o webp',
            'types.required' => 'La categoria è obbligatorio.',

        ];
    }
}
