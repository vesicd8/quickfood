<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LabelRequest extends FormRequest
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
            'label' => "required|unique:labels,label|min:2|max:30"
        ];
    }

    public function messages()
    {
        return [
            'label.required' => "Obavezno je uneti ime markera.",
            'label.unique' => "Marker sa ovim imenom već postoji.",
            'label.min' => "Ime markera mora da sadrži minimum :min karaktera.",
            'label.max' => "Ime markera može da sadrži maksimum :max karaktera.",
        ];
    }
}
