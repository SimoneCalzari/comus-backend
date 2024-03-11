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
            'date' => ['max:255'],
            'customer_name' => ['string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'delivery_address' => ['string', 'max:255'],
            'final_price' => ['decimal: 0,2', 'numeric', 'min:0.01'],
        ];
    }
}
