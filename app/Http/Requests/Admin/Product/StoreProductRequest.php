<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProductRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'scientific_name' => ['required', 'string', 'max:255'],
            'trading_name' => ['required', 'string', 'max:255'],
            'date_of_validity' => ['required', 'date', 'after:now'],
            'manufacturer' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'sell_price' => ['required', 'numeric', 'min:0', 'gt:price'],
            'quantity' => ['required', 'integer', 'min:0'],
            'category_id' => [
                'required',
                Rule::exists('categories', 'id'),
            ],
            'image' => ['required', 'image', 'max:2048'],
        ];
    }
}
