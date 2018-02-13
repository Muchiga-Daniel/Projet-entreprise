<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RechercheRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(auth()->check())
        {
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'email',
            'numero' => 'phone|min:10',
            'nom' => 'alpha_num|min:3',
            'prenom' => 'alpha_num|min:3',
            'date_naissance' => 'date|nullable',
        ];
    }
}
