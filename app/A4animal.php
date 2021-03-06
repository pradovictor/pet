<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class A4animal extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'a4animal';
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public $fillable = array(
        'id', 
        'nome',
        'sexo',
        'pedigree',
        'pedigree_numero',
        'morto',
        'a4especie_id',
        'a4raca_id',
        'a4pelagem_id',
        'a4proprietario_id',
        'data_nascimento',
        'data_inclusao',
        'data_alteracao',
        'historico',
    );

    // ajuste data formato d-m-a - data_nascimento
    public function setDatanascimentoAttribute($value) {
        $this->attributes['data_nascimento'] = ( !empty($value) ? Carbon::createFromFormat("d/m/Y", $value) : null );
    }

    public function getDatanascimentoAttribute() {
        $returnDate = null;
        if(!empty($this->attributes['data_nascimento'])) {
            $dateCarbon = new Carbon($this->attributes['data_nascimento']);
            $returnDate = $dateCarbon->format("d/m/Y");
        }
        return $returnDate;
    }


    public function proprietario() {
        return $this->belongsTo('App\A4proprietario','a4proprietario_id');
    }

    public function especie() {
        return $this->belongsTo('App\A4especie','a4especie_id');
    }

    // relacao com peso
    public function clientesPeso() {
        return $this->hasMany('App\A4animalPeso', 'a4animal_id');
    } 


}



