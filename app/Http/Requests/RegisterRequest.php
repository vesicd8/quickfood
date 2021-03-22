<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'firstName' => 'required|min:3|max:15',
            'lastName' => 'required|min:3|max:15',
            'username' => 'required|unique:App\Models\Account,username|not_regex:/^(?!.*\.\.)(?!.*\.$)[^\W][\w.]{6,15}$/i',
            'password' => 'required|not_regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,20}$/i',
            'email' => 'required|email:rfc,dns|unique:App\Models\Account,email'
        ];
    }

    public function messages()
    {
        return [
          'firstName.required' => "Ime je obavezan parametar.",
          'firstName.min' => "Minimalan broj karaktera za ime je :min.",
          'firstName.max' => "Maksimalan broj karaktera za ime je :max.",
          'lastName.required' => "Prezime je obavezan parametar.",
          'lastName.min' => "Minimalan broj karaktera za prezime je :min.",
          'lastName.max' => "Maksimalan broj karaktera za prezime je :max.",
          'username.required' => "Korisničko ime ne sme ostati prazno.",
          'username.not_regex' => "Korisničko ime je lošeg formata. Korisničko ime može da sa drži specijalne karaktere, brojeve i slova uz minimalno 6, a maksimalno 15 karaktera.",
          'username.unique' => "Korisničko ime je zauzeto.",
          'password.required' => "Obavezno je uneti lozinku.",
          'password.not_regex' => "Lozinka nije dobrog formata. Lozinka mora da sadrži bar jedan karakter, jedan specijalni karakter i jedan broj, minimalne dužine 8, a maksimalne 25 karaktera.",
          'email.required' => "Email ne sme ostati prazan.",
          'email.email' => "Email ne postoji.",
          'email.unique' => "Email je zauzet."
        ];
    }
}
