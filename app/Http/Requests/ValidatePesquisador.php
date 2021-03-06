<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Pesquisador;
use Illuminate\Validation\Rule;

class ValidatePesquisador extends FormRequest
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
            "instituicao_id"=>"numeric|present|required",
            "centro_de_trabalho_id"=>"numeric|present|required",
            "vinculo_id"=>"numeric|present|required",
            "cpf"=> "formato_cpf|cpf|required|unique:pesquisador,cpf".(!empty($this->id) ? ','.$this->id : ''),
            "nome"=>"string|max:64|required",
            "email"=> "string|max:64|required|unique:pesquisador,email".(!empty($this->id) ? ','.$this->id : ''),
            // "email"=>"string|max:64|nullable",
            "rg"=>"string|max:15|nullable",
            "orgao"=>"string|max:6|nullable",
            "situacao"=>"string|nullable",
            "endereco"=>"string|max:128|nullable",
            "cidade"=>"string|max:30|nullable",
            "bairro"=>"string|max:64|nullable",
            "estado"=>"string|nullable",
            "cep"=>"string|max:15|nullable",
            "nro_banco"=>"string|max:5|nullable",
            "banco"=>"string|max:32|nullable",
            "agencia"=>"string|max:16|nullable",
            "conta"=>"string|max:24|nullable",
            "pis"=>"string|max:15|nullable",
            "dependente"=>"numeric|nullable",
            "autonomo"=>"string|nullable",
            "inscricao_municipal"=>"string|max:25|nullable",
            "vinculo_empresa"=>"string|nullable",
            "empresa"=>"string|max:64|nullable",
            "telefone"=>"string|max:16|nullable",
            "servidor_instituicao"=>"string|nullable",
            "servidor_publico"=>"string|nullable",
        ];
    }
}