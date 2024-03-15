<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            'cart' => ['required', 'array'],
            'cart.*.restaurant_id' => ['required', 'exists:restaurants,id'],
            'cart.*.id' => ['required', 'exists:dishes,id'],
            'cart.*.quantity' => ['required', 'integer', 'min:1'],
            'formData.customer_name' => ['required', 'string', 'max:255'],
            'formData.phone_number' => ['required', 'string', 'max:20'],
            'formData.email' => ['required', 'email', 'max:255'],
            'formData.delivery_address' => ['required', 'string', 'max:255'],
            'totalPrice' => ['required', 'numeric', 'min:0.01'],
        ];
    }

    public function messages()
    {
        return [
            'cart.required' => 'Il carrello è obbligatorio.',
            'cart.array' => 'Il carrello deve essere un array.',
            'cart.*.restaurant_id.required' => 'ID del ristorante è obbligatorio per ogni elemento del carrello.',
            'cart.*.restaurant_id.exists' => 'Il ristorante specificato in un elemento del carrello non esiste.',
            'cart.*.id.required' => 'ID del piatto è obbligatorio per ogni elemento del carrello.',
            'cart.*.id.exists' => 'Il piatto specificato in un elemento del carrello non esiste.',
            'cart.*.quantity.required' => 'La quantità è obbligatoria per ogni elemento del carrello.',
            'cart.*.quantity.integer' => 'La quantità deve essere un numero intero.',
            'cart.*.quantity.min' => 'La quantità minima per ogni elemento del carrello è 1.',
            'formData.customer_name.required' => 'Il nome del cliente è obbligatorio.',
            'formData.customer_name.string' => 'Il nome del cliente deve essere una stringa.',
            'formData.customer_name.max' => 'Il nome del cliente non può superare :max caratteri.',
            'formData.phone_number.required' => 'Il numero di telefono è obbligatorio.',
            'formData.phone_number.string' => 'Il numero di telefono deve essere una stringa.',
            'formData.phone_number.max' => 'Il numero di telefono non può superare :max caratteri.',
            'formData.email.required' => 'L\'indirizzo email è obbligatorio.',
            'formData.email.email' => 'L\'indirizzo email non è valido.',
            'formData.email.max' => 'L\'indirizzo email non può superare :max caratteri.',
            'formData.delivery_address.required' => 'L\'indirizzo di consegna è obbligatorio.',
            'formData.delivery_address.string' => 'L\'indirizzo di consegna deve essere una stringa.',
            'formData.delivery_address.max' => 'L\'indirizzo di consegna non può superare :max caratteri.',
            'totalPrice.required' => 'Il prezzo totale è obbligatorio.',
            'totalPrice.numeric' => 'Il prezzo totale deve essere un numero.',
            'totalPrice.min' => 'Il prezzo totale deve essere almeno :min.',
        ];
    }
}
