<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateTTTec extends FormRequest
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
            "id"=>"numeric|present",
            "diferencial_tecnologia"=>"string|nullable",
            "areatecnica2"=>"string|nullable",
            "areatecnica"=>"string|nullable",
            "acharpatente"=>"string|max:200|nullable",
        ];
    }
}
