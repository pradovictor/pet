<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class A4proprietario extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'a4proprietario';
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public $fillable = array(
        'cpf',
        'nome',
        'email',
        'rg',
        'orgao',
        'endereco',
        'cidade',
        'bairro',
        'estado',
        'cep',
        'telefone',
        'anotacao_geral',
        'data_cadastro',
        'data_atualizacao',
    );

    // public function clientesHistorico() {
    //     return $this->hasMany('App\A3clientepfHistorico', 'a3clientepf_id');
    // } 

    // public function clientesFormulario() {
    //     return $this->hasMany('App\A3clientepfFormulario', 'a3clientepf_id');
    // } 

    // public function clienteInfodocumentos() {
    //     return $this->hasMany('App\A3clientepfInfodocumento', 'a3clientepf_id');
    // }  


}



