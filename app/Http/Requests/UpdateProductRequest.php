<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'price' => ['decimal:2', 'min:0', 'required'],
            'name' => ['string', 'required'],
            'description' => ['string', 'required'],
            'brand' => ['string', 'required'],
            'photo' => ['image', 'nullable'],
        ];
    }
}
