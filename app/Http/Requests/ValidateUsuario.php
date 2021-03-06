<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ValidateUsuario extends FormRequest
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
            "email"=> "email|max:128|required|unique:usuarios,email".(!empty($this->id) ? ','.$this->id : ''),
            "cpf"=> "cpf|max:15|nullable|unique:usuarios,cpf".(!empty($this->id) ? ','.$this->id : ''),
        ];
    }
}
