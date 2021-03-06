<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\A2proposta;
use Illuminate\Validation\Rule;

class ValidateA2proposta extends FormRequest
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
            "proposta"=> "string|max:32|unique:a2proposta,proposta".(!empty($this->id) ? ','.$this->id : ''),
        ];
    }
}
