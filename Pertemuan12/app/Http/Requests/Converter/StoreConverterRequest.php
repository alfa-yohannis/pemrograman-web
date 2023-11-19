<?php

namespace App\Http\Requests\Converter;

use Illuminate\Foundation\Http\FormRequest;

class StoreConverterRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'from_currency' => 'required',
            'from_currency_description' => 'required',
            'to_currency' => 'required',
            'to_currency_description' => 'required',
            'conversion_rate' => 'required',
        ];
    }
}
