<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria_Cargo extends Model
{
    protected $table='categoria-cargo';
    /*protected $fillable=['nombreCargo'];*/
    protected $guarded=['idCargo','idCategoria'];
    //protected $primaryKey=array('idCargo','idCategoria');

    /*public function Cargo()    {
        return $this->belongsTo('App\Cargo');
    }
    public function Categoria()    {
        return $this->belongsTo('App\Categoria');
    }*/
}
