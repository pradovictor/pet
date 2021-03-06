<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ValidateCi1 extends FormRequest
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
            // "pi_id"=> "unique:ci1,pi_id".(!empty($this->id) ? ','.$this->id : ''),
            "titulo"=> "string|max:256|unique:ci1,titulo".(!empty($this->id) ? ','.$this->id : ''),
            "processo"=> "string|max:64|unique:ci1,processo".(!empty($this->id) ? ','.$this->id : ''),
        ];
    }
}
