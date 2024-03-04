<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDishRequest extends FormRequest
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
            'price' => ['required' , 'unsigned', 'max_digits:5', 'decimal:2'],
            'is_visible' => ['required', 'boolean'],
            'img' => ['nullable', 'max:10240', 'image'],
        ];
    }

    
}
