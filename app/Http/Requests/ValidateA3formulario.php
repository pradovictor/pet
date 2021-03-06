<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\A3formulario;
use Illuminate\Validation\Rule;

class ValidateA3formulario extends FormRequest
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
            "nome"=> "string|max:128|required|unique:a3formulario,nome".(!empty($this->id) ? ','.$this->id : ''),
        ];
    }
}
