<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateA2despesa extends FormRequest
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
            "id"=>"numeric|present|nullable",
            "descricao"=>"string|max:255|nullable",
            "responsavel"=>"string|max:128|nullable",
            "favorecido"=>"string|max:128|nullable",
            "documento"=>"string|max:128|nullable",
            "data_pagamento"=>"date_format:d/m/Y|nullable",
            "data_vencimento"=>"date_format:d/m/Y|nullable",
        ];
    }
}
