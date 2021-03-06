<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\A2clientepf;
use Illuminate\Validation\Rule;

class ValidateA2clientepf extends FormRequest
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
            "cpf"=> "formato_cpf|cpf|required|unique:a2clientepf,cpf".(!empty($this->id) ? ','.$this->id : ''),
            "nome"=>"string|max:64|required",
            // "email"=> "string|max:64|required|unique:a2cliente,email".(!empty($this->id) ? ','.$this->id : ''),
            "email"=>"string|max:64|nullable",
            "rg"=>"string|max:15|nullable",
            "orgao"=>"string|max:6|nullable",
            "endereco"=>"string|max:128|nullable",
            "cidade"=>"string|max:30|nullable",
            "bairro"=>"string|max:64|nullable",
            "estado"=>"string|nullable",
            "cep"=>"string|max:15|nullable",
            "telefone"=>"string|max:16|nullable",
        ];
    }
}