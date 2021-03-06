<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidatePIFomento extends FormRequest
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
            "codigo"=>"string|max:30|nullable",
            "nome"=>"string|max:35|nullable",
            "nroprocesso"=>"string|max:30|nullable",
            "titularidade"=>"numeric|nullable",
        ];
    }
}
