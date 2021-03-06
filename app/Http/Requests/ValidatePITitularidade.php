<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidatePITitularidade extends FormRequest
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
            "entidade"=>"string|max:30|nullable",
            "processo"=>"string|max:32|nullable",
            "acordo"=>"in:sim,nao|nullable",
            "data"=>"date_format:d/m/Y|nullable",
            "porcentagem"=>"numeric|nullable",
        ];
    }
}
