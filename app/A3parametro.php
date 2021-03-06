<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class A3parametro extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'a3parametro';
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public $fillable = array(
        'id', 
        'cabecario1',
        'cabecario2',
        'rodape1',
        'rodape2',
        'intervalo',
        'horamin',
        'horamax',
    );


}



