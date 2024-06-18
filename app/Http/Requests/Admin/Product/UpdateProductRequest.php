<?php

namespace App\Http\Requests\Admin\Product;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'scientific_name' => ['string', 'max:255'],
            'trading_name' => ['string', 'max:255'],
            'date_of_validity' => ['date', 'after:now'],
            'manufacturer' => ['string', 'max:255'],
            'price' => ['numeric', 'min:0'],
            'sell_price' => ['numeric', 'min:0', 'gt:price'],
            'quantity' => ['integer', 'min:0'],
            'category_id' => [
                Rule::exists('categories', 'id'),
            ],
            'image' => ['image','mimes:jpeg,png,jpg', 'max:2048'],
        ];
    }
}
