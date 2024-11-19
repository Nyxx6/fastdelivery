<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules() : array
    {
        return [
            'nom' => ['required', 'string', 'max:100'],
            'prenom' => ['required', 'string', 'max:100'],
            'adresse' => ['required', 'string', 'max:255'],
            'genre' => ['required', 'string', Rule::in(['Inconnu', 'Homme', 'Femme'])],
            'date_naissance' => ['required', 'date', 'before:today'],
            'resto_fav' => ['required', 'string', 'max:255'],
            'tel' => ['required', 'string', 'regex:/^(?:(?:\+213|0)(?:5|6|7)\d{8})$/'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
        ];
    }
}
