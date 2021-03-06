<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permissao extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'permissoes';
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public $fillable = array(
        'nome',
        'identificador',
    );

    public function usuariosNits() {
        return $this->belongsToMany("App\UsuarioNit", "usuario_nit_permissao", "permissao_id", "usuario_nit_id");
    }
}