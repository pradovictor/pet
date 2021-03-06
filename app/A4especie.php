<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class A4especie extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'a4especie';
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public $fillable = array(
        'id', 
        'nome',
    );


}



