<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\A4animal;

class A4animalPeso extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'a4animal_peso';
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public $fillable = array(
        'id',
        'a4animal_id', 
        'data',
        'peso', 
    );

    // ajuste data formato d-m-a
    public function setDataAttribute($value) {
        $this->attributes['data'] = ( !empty($value) ? Carbon::createFromFormat("d/m/Y", $value) : null );
    }

    public function getDataAttribute() {
        $returnDate = null;
        if(!empty($this->attributes['data'])) {
            $dateCarbon = new Carbon($this->attributes['data']);
            $returnDate = $dateCarbon->format("d/m/Y");
        }
        return $returnDate;
    }

    // eloquent
     public function a4animal() {
        return $this->belongsTo('App\A4animal');
    }

}

