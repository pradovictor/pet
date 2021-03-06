<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidatePIRegistro extends FormRequest
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
            "codigo_registro"=>"string|max:30|nullable",
            "codigo_registro"=>"string|max:32|nullable",
            "titulo"=>"string|max:255|nullable",
            "pais_id"=>"numeric|present",
            "status"=>"string|present",
            "data_registro"=>"date_format:d/m/Y|nullable",
            "data_concessao"=>"date_format:d/m/Y|nullable",
            "data_indeferimento"=>"date_format:d/m/Y|nullable",
        ];
    }
}
