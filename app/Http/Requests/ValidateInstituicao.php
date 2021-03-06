<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ValidateInstituicao extends FormRequest
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
            "nome_curto"=> "string|max:32|required|unique:instituicao,nome_curto".(!empty($this->id) ? ','.$this->id : ''),
            "nome_completo"=> "string|max:128|required|unique:instituicao,nome_completo".(!empty($this->id) ? ','.$this->id : ''),
            "cnpj"=> "formato_cnpj|cnpj|required|unique:instituicao,cnpj".(!empty($this->id) ? ','.$this->id : ''),
            // "cnpj"=>"formato_cnpj|cnpj|nullable",
            "inscricao_estadual"=>"string|max:30|nullable",
            "endereco"=>"string|max:128|nullable",
            "bairro"=>"string|max:64|nullable",
            "cidade"=>"string|max:64|nullable",
            "estado"=>"string|max:2|nullable",
            "cep"=>"formato_cep|max:9|nullable",
            "telefone"=>"string|max:32|nullable",
            "fax"=>"string|max:32|nullable",
            "email_contato"=>"email|max:64|nullable",
            "site"=>"string|max:64|nullable"
            // era "site"=>"url|max:64|nullable"
        ];
    }
}
