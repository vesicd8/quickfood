<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'address' => 'regex:/^[A-ZŽŠĐČĆa-zžšđčć0-9\.\-\_]+(\s[A-ZŽŠĐČĆa-zžšđčć0-9\.\-\_]+)*$/i',
            'phone' => 'regex:/^06[0-9]{7,8}$/i',
            'cartItems' => 'required|exists:products,id'
        ];
    }
}
