<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;

class UpdateProductRequest extends FormRequest
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
            'productName' => 'required|min:3|max:40',
            'productCategory' => 'required|exists:categories,id',
            'productPrice' => 'required|numeric',
            'productDescription' => 'required|max:250',
            'productUnitValue' => 'required|numeric',
            'productUnit' => 'required|exists:units,id'
        ];
    }

    public function messages()
    {
        return [
            'productName.required' => "Ime produkta nije uneto.",
            'productName.min' => "Minimalan broj karaktera je :min.",
            'productName.max' => "Maksimalan broj karaktera je :max.",
            'productCategory.required' => "Kategorija nije uneta.",
            'productCategory.exists' => "Uneta kategorija ne postoji.",
            'productPrice.required' => "Obavezno je uneti cenu.",
            'productPrice.numeric' => "Cena mora da sadrži samo brojeve.",
            'productDescription.required' => "Opis proizvoda je obavezan.",
            'productDescription.min' => "Opis ne sme da bude kraći od :min karaktera.",
            'productDescription.max' => "Opis ne sme da bude duži od :max karaktera.",
            'productUnitValue.required' => "Obavezno je uneti količinu.",
            'productUnitValue.numeric' => "Količina mora da se sastoji iskljućivo od brojeva.",
            'productUnit.required' => "Jedinica za količinu je obavezna.",
            'productUnit.exists' => "Jedinica ne postoji.",
            'productImage.between' => "Veličina slike ne sme biti veća od 5mb.",
            'productImage.mimes' => "Fajl mora biti formata jpg, jpeg ili png.",
            'productImage.dimensions' => "Odnos širine i visine slike mora biti 1:1.",
            'productImage.between' => "Slika ne sme biti veća od 5mb."
        ];
    }

}
