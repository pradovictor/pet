<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateA3clientepfInfodocumento extends FormRequest
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
            "id"=>"numeric|nullable",
            "nome"=>"string|max:128|nullable",
            "descricao"=>"string|max:128|nullable",
            "data_aprovacao"=>"date_format:d/m/Y|nullable",
        ];
    }
}
