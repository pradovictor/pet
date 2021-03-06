<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class A3clientepf extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'a3clientepf';
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
        'celular',
        'fax',
        'mae',
        'pai',
        'ocupacao',
        'data_nascimento',
        'anotacao_geral',
    );

    public function clientesHistorico() {
        return $this->hasMany('App\A3clientepfHistorico', 'a3clientepf_id');
    } 

    public function clientesFormulario() {
        return $this->hasMany('App\A3clientepfFormulario', 'a3clientepf_id');
    } 

    public function clienteInfodocumentos() {
        return $this->hasMany('App\A3clientepfInfodocumento', 'a3clientepf_id');
    }  

    // public static function getNotUsedByPI($term, $codigo) {
    //     $resultSearch = DB::table('pesquisador')
    //         ->leftJoin('pi_pesquisador', function($join) use ($codigo) {
    //             $join->on('pi_pesquisador.cpf', '=', 'pesquisador.cpf');
    //             $join->where('pi_pesquisador.codigo','=', $codigo);
    //         })
    //         ->whereNull('pi_pesquisador.id')
    //         ->select('pesquisador.*');

    //         return DB::table('pesquisador')
    //         ->joinSub($resultSearch, 'PIP', function($join) {
    //             $join->on('pesquisador.cpf', '=', 'PIP.cpf');
    //         })
    //         ->where('pesquisador.cpf','LIKE','%'.$term.'%')
    //         ->orWhere('pesquisador.inventor','LIKE','%'.$term.'%')
    //         ->get();
    // }

    // public function vinculo() {
    //     return $this->belongsTo('App\Vinculo', 'vinculo_id');
    // }

    // public function centro() {
    //     return $this->belongsTo('App\Centro', 'centro_de_trabalho_id');
    // }
    
    // public function instituicao() {
    //     return $this->belongsTo('App\Instituicao', 'instituicao_id');
    // }

    // public function pipesquisador() {
    //     return $this->hasMany('App\PIPesquisador', 'pesquisador_id');
    // }

    // public function ci1pesquisador() {
    //     return $this->hasMany('App\CI1Pesquisador', 'pesquisador_id');
    // }



}



