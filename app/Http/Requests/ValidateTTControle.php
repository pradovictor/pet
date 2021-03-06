<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateTTControle extends FormRequest
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
            "empresa_id"=>"numeric|nullable",
            "data"=>"date_format:d/m/Y|nullable",
            "acao"=>"string|max:255|nullable",
            "realizado"=>"in:sim,nao|nullable",
        ];
    }
}
