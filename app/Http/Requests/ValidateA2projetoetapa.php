<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateA2projetoEtapa extends FormRequest
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
            "descricao"=>"string|max:256|nullable",
            // "descricao"=> "string|max:256|required|unique:a2projeto_etapa,descricao".(!empty($this->id) ? ','.$this->id : ''),
            "datai"=>"date_format:d/m/Y|nullable",
            "datai"=>"date_format:d/m/Y|nullable",
        ];
    }
}
