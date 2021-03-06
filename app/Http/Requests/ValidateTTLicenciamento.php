<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateTTLicenciamento extends FormRequest
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
            "empresa_id"=>"numeric|nullable",
            "pi_registro_id"=>"numeric|nullable",
            "data_inicio"=>"date_format:d/m/Y|nullable",
            "data_final"=>"date_format:d/m/Y|nullable",
            "royalties_d"=>"numeric|nullable",
            "exclusivo"=>"in:sim,nao|nullable",
            "ativo"=>"in:sim,nao|nullable",
            "observacao"=>"string|nullable",
        ];
    }
}
