<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ValidateCentro extends FormRequest
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
            "instituicao_id"=>"numeric|required",
            "instituto"=>"string|max:64|required",
            "departamento"=>"string|max:64|required",
            "sigla"=>"string|max:16|required",
            "local"=>"string|max:32|required"
        ];
    }
}
