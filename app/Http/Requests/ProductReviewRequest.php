<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductReviewRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'productStars' => 'required|digits_between:1,5',
            'reviewText' => 'required|min:10|max:250',
            'product' => 'required|exists:products,id'
        ];
    }

    public function messages()
    {
        return [
            'productStars.required' => 'Morate uneti ocenu.',
            'productStars.between' => 'Ocena mora biti od 1 do 5.',
            'reviewText.required' => 'Morate uneti komentar.',
            'reviewText.min' => 'Komentar može imati najmanje 10 karaktera.',
            'reviewText.max' => 'Komentar može imati maksimum 250 karaktera.',
            'product.required' => 'Proizvod nije izabran.',
            'product.exists' => 'Proizvod ne postoji.',
        ];
    }
}
