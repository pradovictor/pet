<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Acesso extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'acesso';
    
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public $fillable = array(
        'id',
        'usuario',
        'data',
        'hora',
        'nome',
        'tipo',
    );

    public function setDataAttribute($value) {
        $this->attributes['data'] = ( !empty($value) ? Carbon::createFromFormat("d/m/Y", $value) : null );
    }
    
    public function getDataAttribute() {
        $returnDate = null;
        if (!empty($this->attributes['data'])) {
            $dateCarbon = new Carbon($this->attributes['data']);
            $returnDate = $dateCarbon->format("d/m/Y");
        }
        return $returnDate;   
    }


}