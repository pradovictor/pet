<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ValidatePermissao extends FormRequest
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
            "nome"=> "string|max:200|required|unique:permissoes,nome".(!empty($this->id) ? ','.$this->id : ''),
            "identificador"=> "string|max:200|required|unique:permissoes,identificador".(!empty($this->id) ? ','.$this->id : ''),
        ];
    }
}
