<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateRpi extends FormRequest
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
            "codigo_rpi"=>"string|max:8|nullable",
            "data_publicacao"=>"date_format:d/m/Y|nullable",
            "prazo"=>"date_format:d/m/Y|nullable",
        ];
    }
}
