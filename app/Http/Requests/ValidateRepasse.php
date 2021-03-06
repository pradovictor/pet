<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateRepasse extends FormRequest
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
            "nome"=>"string|max:64|nullable",
            "data_inicio"=>"date_format:d/m/Y|nullable",
            "data_final"=>"date_format:d/m/Y|nullable",
        ];
    }
}
