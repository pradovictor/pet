<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ValidateNit extends FormRequest
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
            "nomecurto"=> "string|max:30|required|unique:nits,nomecurto".(!empty($this->id) ? ','.$this->id : ''),
            "nome"=> "string|max:200|required|unique:nits,nome".(!empty($this->id) ? ','.$this->id : ''),
            "email"=> "string|max:64|required|unique:nits,email".(!empty($this->id) ? ','.$this->id : ''),
        ];
    }
}
