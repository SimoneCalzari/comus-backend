<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'name' => ['required', 'max:50'],
            'address' => ['required', 'max:100', 'unique'],
            'phone_number' => ['required', 'max:20'],
            'VAT' => ['required', 'max:11'],
            'img' => ['required', 'max:200', 'image'],
            'types' => ['exists:types,id']
        ];
    }
    // public function messages()
    // {
    //     return [

    //         'title.required' => 'Il titolo è obbligatorio.',
    //         'title.max' => 'Il titolo non può superare i :max caratteri.',
    //         'status.required' => 'Lo stato è obbligatorio.',
    //         'status.max' => 'Lo stato non può superare i :max caratteri.',
    //         'start_date.required' => 'La data è obbligatoria.',
    //     ];
    // }
}