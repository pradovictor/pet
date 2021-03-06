<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ValidateEmpresa extends FormRequest
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
            "nome_curto"=> "string|max:64|required|unique:empresa,nome_curto".(!empty($this->id) ? ','.$this->id : ''),
            "nome_completo"=> "string|max:255|required|unique:empresa,nome_completo".(!empty($this->id) ? ','.$this->id : ''),
            // "cnpj"=>"formato_cnpj|cnpj|nullable",
            "cnpj"=> "formato_cnpj|cnpj|required|unique:empresa,cnpj".(!empty($this->id) ? ','.$this->id : ''),
            "inscricao_estadual"=>"string|max:30|nullable",
            "endereco"=>"string|max:128|nullable", 
            "bairro"=>"string|max:64|nullable",
            "cidade"=>"string|max:64|nullable",
            "estado"=>"string|nullable",
            "pais_id"=>"numeric|nullable",
            "cep"=>"formato_cep|max:9|nullable",
            "telefone"=>"string|max:32|nullable",
            "fax"=>"string|max:32|nullable",
            "email"=>"email|max:64|nullable",
            "contato"=>"string|max:128|nullable",
            "site"=>"url|max:64|nullable",
            "atuacao"=>"string|max:255|nullable",
            "atividade"=>"string|max:255|nullable",
            "produto"=>"string|max:255|nullable",
        ];
    }
}
