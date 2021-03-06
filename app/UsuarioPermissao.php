<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class UsuarioPermissao extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'usuario_permissao';
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public $fillable = array(
        'usuario_id',
        'permissao_identificador',
    );

    
}