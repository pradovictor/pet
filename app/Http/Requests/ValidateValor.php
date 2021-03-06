<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateValor extends FormRequest
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
            "servico"=>"string|max:25|required",
            "status"=>"string|max:40|required",
             "tipo"=>"string|max:20|required"
            // "valor"=>"string|max:30|required"
        ];
    }
}