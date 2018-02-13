<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LiensRequest extends FormRequest
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
            'url' => 'bail|required|between:5,255',
            'valide_at' => 'bail|required|date|date_format:Y-m-d',
            'user_id' => 'bail|required|numeric',
            'id_prospect' => 'bail|nullable|numeric',
            'campagne_recrutement' => 'bail|nullable|boolean',
            'ci' => 'bail|nullable|alpha_num',
        ];
    }
}